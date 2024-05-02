<?php
require('../actions/database.php');

// Définition des clés de paramètres et de leurs équivalents SQL
$paramMapping = [
    'id_constructeur' => 'f.id_constructeur IN',
    'id_type' => 'f.id_type IN',
    'id_modele' => 'f.id_modele IN',
    'id_annee' => 'f.id_annee IN',
    'id_segment' => 'f.id_segment IN'
];

// Initialisation des variables pour la requête SQL
$conditions = [];
$params = [];

// Parcourir les paramètres pour construire les conditions SQL et les paramètres
foreach ($paramMapping as $paramKey => $sqlCondition) {
    if (isset($_GET[$paramKey]) && !empty($_GET[$paramKey])) {
        $ids = explode(",", $_GET[$paramKey]);
        $placeholders = rtrim(str_repeat('?,', count($ids)), ','); // Créer les placeholders
        $conditions[] = "$sqlCondition ($placeholders)";
        $params = array_merge($params, $ids); // Ajouter les IDs au tableau des paramètres
    }
}

// Recherche
$searchCondition = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchInput = $_GET['search'];
    $searchCondition = " (f.nom LIKE ? OR c.nom LIKE ? OR m.nom LIKE ? OR a.nom LIKE ?) ";
    $params = array_merge($params, array_fill(0, 4, "%$searchInput%"));
}

// Construction de la requête SQL
$sql = "SELECT f.*, c.nom AS nom_constructeur, m.nom AS nom_modele, a.nom AS nom_annee
        FROM fiches f
        LEFT JOIN constructeurs c ON f.id_constructeur = c.id
        LEFT JOIN modeles m ON f.id_modele = m.id
        LEFT JOIN annees a ON f.id_annee = a.id";

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

// Gestion du tri
$sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Récupérer le paramètre de tri
switch ($sort) {
    case 'alphabetique_asc':
        $sql .= " ORDER BY f.nom ASC";
        break;
    case 'alphabetique_desc':
        $sql .= " ORDER BY f.nom DESC";
        break;
    case 'annee_asc':
        $sql .= " ORDER BY a.nom ASC";
        break;
    case 'annee_desc':
        $sql .= " ORDER BY a.nom DESC";
        break;
    default:
        $sql .= " ORDER BY f.nom ASC"; // Par défaut, tri par ordre alphabétique croissant
        break;
}

// Exécution de la requête avec les paramètres
$getAllFiches = $bdd->prepare($sql);
$getAllFiches->execute($params);

// Affichage des résultats
if ($getAllFiches->rowCount() > 0) {
    while ($fiche = $getAllFiches->fetch()) {
        // Votre code d'affichage des résultats ici
        $getPhotos = $bdd->prepare('SELECT * FROM imagesfiche WHERE id_fiche = ?');
        $getPhotos->execute([$fiche['id']]);
        $photo = $getPhotos->fetch();

        $stringImageFiche = $fiche['nom_modele'] . "/" . $fiche['id'] . "/" . $photo['img_1'];
        ?>
        <div class="column">
            <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src="../../library/voitures/<?= $stringImageFiche; ?>" width="100%"/></a>
            <div class="text">
                <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $fiche['nom_constructeur']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $fiche['nom_annee']; ?> </span></p>
            </div>
        </div>
        <?php
    }
} else {
    $error = "Aucune voiture n'a été trouvée.";
}
?>
