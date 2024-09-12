<?php
require('../actions/Database.php');

// Définition des clés de paramètres et de leurs équivalents SQL
$paramMapping = [
    'id_constructeur' => 'f.ID_CONSTRUCTEUR', // Utilisé via FICHE_CONSTRUCTEUR maintenant
    'id_modele' => 'f.ID_MODELE',
    'id_annee' => 'f.ID_ANNEE_DEBUT',
    'id_segment' => 'f.ID_SEGMENT'
];

// Initialisation des variables pour la requête SQL
$conditions = [];
$params = [];

// Parcourir les paramètres pour construire les conditions SQL et les paramètres
foreach ($paramMapping as $paramKey => $sqlColumn) {
    if ($paramKey !== 'id_annee' && isset($_GET[$paramKey]) && !empty($_GET[$paramKey])) {
        $ids = explode(",", $_GET[$paramKey]);
        $placeholders = rtrim(str_repeat('?,', count($ids)), ','); // Créer les placeholders
        if ($paramKey === 'id_constructeur') {
            // Ne filtrez que les fiches qui ont le constructeur spécifié, mais ne limitez pas les constructeurs affichés
            $conditions[] = "f.ID IN (SELECT ID_FICHE FROM FICHE_CONSTRUCTEUR WHERE ID_CONSTRUCTEUR IN ($placeholders))";
        } else {
            $conditions[] = "$sqlColumn IN ($placeholders)";
        }
        $params = array_merge($params, $ids); // Ajouter les IDs au tableau des paramètres
    }
}

// Traitement du paramètre `id_type`
if (isset($_GET['id_type']) && !empty($_GET['id_type'])) {
    $idsType = explode(",", $_GET['id_type']);
    $placeholdersType = rtrim(str_repeat('?,', count($idsType)), ',');
    $conditions[] = "ft.ID_TYPE IN ($placeholdersType)";
    $params = array_merge($params, $idsType);
}

// Recherche
$searchCondition = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchInput = $_GET['search'];
    $searchCondition = " (f.NOM_FICHE LIKE ? OR c.NOM_CONSTRUCTEUR LIKE ? OR m.NOM_MODELE LIKE ? OR a.NOM_ANNEE LIKE ?) ";
    $params = array_merge($params, array_fill(0, 4, "%$searchInput%"));
}

// Construction de la requête SQL
$sql = "SELECT f.ID, f.NOM_FICHE, GROUP_CONCAT(DISTINCT c.NOM_CONSTRUCTEUR ORDER BY c.NOM_CONSTRUCTEUR SEPARATOR ', ') AS NOM_CONSTRUCTEUR, 
               m.NOM_MODELE, a.NOM_ANNEE, GROUP_CONCAT(DISTINCT i.IMAGE_URL ORDER BY i.IMAGE_URL SEPARATOR ',') AS image_urls, g.NOM_GENERATION
        FROM FICHE f
        LEFT JOIN FICHE_CONSTRUCTEUR fc ON f.ID = fc.ID_FICHE
        LEFT JOIN CONSTRUCTEUR c ON fc.ID_CONSTRUCTEUR = c.ID
        LEFT JOIN MODELE m ON f.ID_MODELE = m.ID
        LEFT JOIN ANNEE a ON f.ID_ANNEE_DEBUT = a.ID
        LEFT JOIN FICHE_TYPE ft ON f.ID = ft.ID_FICHE
        LEFT JOIN GENERATION g ON f.ID_GENERATION = g.ID
        LEFT JOIN IMAGE i ON f.ID = i.ID_FICHE";

// Ajout des conditions à la requête SQL si des filtres sont appliqués
if (!empty($conditions) || !empty($searchCondition)) {
    $sql .= " WHERE ";
    if (!empty($conditions)) {
        $sql .= implode(" AND ", $conditions);
        if (!empty($searchCondition)) {
            $sql .= " AND ";
        }
    }
    if (!empty($searchCondition)) {
        $sql .= $searchCondition;
    }
}

// Ajout de la clause GROUP BY pour éviter la duplication des fiches
$sql .= " GROUP BY f.ID";


// Gestion du tri
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
switch ($sort) {
    case 'alphabetique_asc':
        $sql .= " ORDER BY f.NOM_FICHE ASC";
        break;
    case 'alphabetique_desc':
        $sql .= " ORDER BY f.NOM_FICHE DESC";
        break;
    case 'annee_asc':
        $sql .= " ORDER BY a.NOM_ANNEE ASC";
        break;
    case 'annee_desc':
        $sql .= " ORDER BY a.NOM_ANNEE DESC";
        break;
    default:
        $sql .= " ORDER BY f.NOM_FICHE ASC";
        break;
}

// Exécution de la requête avec les paramètres
$getAllFiches = $bdd->prepare($sql);
$getAllFiches->execute($params);

// Affichage des résultats
if ($getAllFiches->rowCount() > 0) {
    ?>
    <div class="row" id="colonne">
        <?php
        while ($fiche = $getAllFiches->fetch()) {
            $getPhotos = $bdd->prepare('SELECT * FROM IMAGE WHERE ID_FICHE = ?');
            $getPhotos->execute([$fiche['ID']]);
            $photo = $getPhotos->fetch();

            $cheminImage = "../../library/dummy/aucune_image.png";

            $cheminDossier = "../../library/voitures/" . $fiche['NOM_MODELE'] . "/" . $fiche['ID'];
            if (is_dir($cheminDossier)) {
                $fichiers = scandir($cheminDossier);
                $fichiers = array_diff($fichiers, array('.', '..'));

                if (!empty($fichiers)) {
                    $cheminImage = "../../library/voitures/" . $fiche['NOM_MODELE'] . "/" . $fiche['ID'] . "/" . $photo['IMAGE_URL'];
                }
            }

            ?>
            <div class="column">
                <a href="pageFiche.php?id_fiche=<?= $fiche['ID']; ?>">
                    <input type="image" src="<?= $cheminImage; ?>" width="100%"/>
                    <div class="text">
                        <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $fiche['NOM_CONSTRUCTEUR']; ?> </span>  <?= $fiche['NOM_FICHE']; ?></p>
                        <p class="nomWidgetFiche">Phase <?= $fiche['NOM_GENERATION']; ?> - <span class="spanNomAnnee"><?= $fiche['NOM_ANNEE']; ?> </span></p>
                    </div>
                </a>
            </div>

            <?php
        }
        ?>
    </div>
    <?php
} else {
    $error = "Aucune voiture n'a été trouvée.";
}
?>
