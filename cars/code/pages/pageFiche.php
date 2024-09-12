<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Fiche</title><!--Titre de la page web-->
    <link href="../css/styleFiche.css" rel="stylesheet">
</head>
<!--------------------------------------------HEAD------------------------------------------------------>

<!--------------------------------------------HEADER------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
require('../actions/constant/paths.php');
?>
<!--------------------------------------------HEADER------------------------------------------------------>

<!----------PATH---------->
<div class="global-pathButtons">
        <a href="pageIndex.php" class="global-boutonPath">Accueil</a>
        <a href="pageVoitures.php" class="global-boutonPath">/Voitures</a>
        <a class="global-boutonPathActual">/Fiche</a>
</div>
<!----------PATH---------->

<!----------CARD---------->
<br>

<?php
if (isset($_GET['id_fiche']) && !empty($_GET['id_fiche'])) {
    $fiche_id = $_GET['id_fiche'];

    $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
    $getInfosOfThisFicheReq->execute([$fiche_id]);
    $ficheInfos = $getInfosOfThisFicheReq->fetch();

    if (!$ficheInfos) {
        echo '<p class="errorFicheNonTrouvee">Erreur 10 : Fiche introuvable.</p>';
    } else {
        // -------------------------------CONSTRUCTEURS----------------------------------------------------
        $getConstructeurs = $bdd->prepare('
            SELECT ID_CONSTRUCTEUR
            FROM FICHE_CONSTRUCTEUR
            WHERE ID_FICHE = ?');
        $getConstructeurs->execute([$ficheInfos['ID']]);
        $constructeursIds = $getConstructeurs->fetchAll(PDO::FETCH_COLUMN);

        // Initialiser les tableaux pour les noms des constructeurs, des groupes et des pays
        $constructeursNoms = [];
        $groupesNoms = [];
        $paysInfos = []; // Stocker les informations des pays pour chaque constructeur

        foreach ($constructeursIds as $constructeurId) {
            // Requête pour récupérer les informations du constructeur
            $getConstructeur = $bdd->prepare('
                SELECT c.NOM_CONSTRUCTEUR, c.ID_GROUPE, c.ID_PAYS
                FROM CONSTRUCTEUR c
                WHERE c.ID = ?');
            $getConstructeur->execute([$constructeurId]);
            $ficheConstructeur = $getConstructeur->fetch();

            if ($ficheConstructeur) {
                $constructeursNoms[] = htmlspecialchars($ficheConstructeur['NOM_CONSTRUCTEUR']);

                // Récupérer le groupe associé à ce constructeur
                $getGroupe = $bdd->prepare('SELECT NOM_GROUPE FROM GROUPE WHERE ID = ?');
                $getGroupe->execute([$ficheConstructeur['ID_GROUPE']]);
                $ficheGroupe = $getGroupe->fetch();

                if ($ficheGroupe) {
                    $groupesNoms[] = htmlspecialchars($ficheGroupe['NOM_GROUPE']);
                }

                // Récupérer le pays associé à ce constructeur
                $getPays = $bdd->prepare('
                    SELECT NOM_PAYS, IMAGE_PAYS
                    FROM PAYS
                    WHERE ID = ?');
                $getPays->execute([$ficheConstructeur['ID_PAYS']]);
                $fichePays = $getPays->fetch();

                if ($fichePays) {
                    $paysInfos[] = $fichePays; // Stocker toutes les informations de pays
                }
            }
        }

        // Convertir les tableaux en chaînes de caractères séparées par des tirets
        $constructeursNomsString = implode(' - ', $constructeursNoms);
        $groupesNomsString = isset($groupesNoms) ? implode(' - ', $groupesNoms) : 'Aucun groupe';

        // Préparer l'affichage des pays et des drapeaux
        $paysDisplay = '';
        foreach ($paysInfos as $pays) {
            $paysDisplay .= htmlspecialchars($pays['NOM_PAYS']);
            if (!empty($pays['IMAGE_PAYS'])) {
                $paysDisplay .= ' <img src="../../library/flags/' . htmlspecialchars($pays['IMAGE_PAYS']) . '" alt="Drapeau" class="flag-icon">';
            }
            $paysDisplay .= ' ';
        }
        $paysDisplay = trim($paysDisplay);

        // -------------------------------ANNEES----------------------------------------------------
        $getAnnee = $bdd->prepare('SELECT * FROM ANNEE WHERE ID = ?');
        $getAnnee->execute([$ficheInfos['ID_ANNEE_DEBUT']]);
        $ficheAnne = $getAnnee->fetch();

        $getAnnee2 = $bdd->prepare('SELECT * FROM ANNEE WHERE ID = ?');
        $getAnnee2->execute([$ficheInfos['ID_ANNEE_FIN']]);
        $ficheAnne2 = $getAnnee2->fetch();
        // -------------------------------MODELE----------------------------------------------------
        $getModele = $bdd->prepare('SELECT * FROM MODELE WHERE ID = ?');
        $getModele->execute([$ficheInfos['ID_MODELE']]);
        $modele = $getModele->fetch();
        // -------------------------------GEN----------------------------------------------------
        $getGeneration = $bdd->prepare('SELECT * FROM GENERATION WHERE ID = ?');
        $getGeneration->execute([$ficheInfos['ID_GENERATION']]);
        $generation = $getGeneration->fetch();
        // -------------------------------GROUPES----------------------------------------------------

        // -------------------------------TYPES----------------------------------------------------
        $getFicheTypes = $bdd->prepare('SELECT * FROM FICHE_TYPE WHERE ID_FICHE = ?');
        $getFicheTypes->execute([$ficheInfos['ID']]);
        $ficheTypes = $getFicheTypes->fetchAll();
        // -------------------------------SEGMENT----------------------------------------------------
        $getSegment = $bdd->prepare('SELECT * FROM SEGMENT WHERE ID = ?');
        $getSegment->execute([$ficheInfos['ID_SEGMENT']]);
        $ficheSegment = $getSegment->fetch();
        // -------------------------------IMAGES----------------------------------------------------
        $getImage = $bdd->prepare('SELECT IMAGE_URL FROM IMAGE WHERE ID_FICHE=?');
        $getImage->execute([$ficheInfos['ID']]);
        $image = $getImage->fetch();
        // -------------------------------VERSIONS----------------------------------------------------
        $getLignesOfTab = $bdd->prepare('SELECT * FROM VERSION WHERE ID_FICHE = ?');
        $getLignesOfTab->execute([$fiche_id]);
        $tabInfos = $getLignesOfTab->fetchAll();

        // -------------------------------TYPES----------------------------------------------------
        $typesList = [];

        foreach ($ficheTypes as $ficheType) {
            $getType = $bdd->prepare('SELECT * FROM TYPE WHERE ID = ?');
            $getType->execute([$ficheType['ID_TYPE']]);
            $Type = $getType->fetch();
            $typesList[] = htmlspecialchars($Type['NOM_TYPE']);
        }

        $typesString = implode(' - ', $typesList);

        $cheminImage = "../../library/dummy/aucune_image.png";
        $cheminDossier = "../../library/voitures/" . $modele['NOM_MODELE'] . "/" . $ficheInfos['ID'];

        if (is_dir($cheminDossier)) {
            $fichiers = array_diff(scandir($cheminDossier), ['.', '..']);
            if (!empty($fichiers)) {
                $cheminImage = "../../library/voitures/" . $modele['NOM_MODELE'] . "/" . $ficheInfos['ID'] . "/" . htmlspecialchars($image['IMAGE_URL']);
            }
        }

        ?>

        <div class="color-band">
            <div class="car-details">
                <div class="content-left">
                    <p><?= htmlspecialchars($ficheInfos['RESUME_FICHE']); ?></p>
                </div>
                <div class="title-banner">
                    <h2><?= htmlspecialchars($ficheConstructeur['NOM_CONSTRUCTEUR']); ?> <?= htmlspecialchars($ficheInfos['NOM_FICHE']); ?></h2>
                </div>
                <a href="#summary-anchor" class="btn-banner-1">
                    <img src="<?= $iconsFiche; ?>modele-voiture.png" alt="Icone" class="banner-icon4">
                    <p>Modèle : <?= htmlspecialchars($modele['NOM_MODELE']); ?></p>
                </a>

                <a href="#summary-anchor" class="btn-banner-2">
                    <img src="<?= $iconsFiche; ?>segment.png" alt="Icone" class="banner-icon7">
                    <p>Type : <?= htmlspecialchars($typesString); ?></p>
                </a>
                <a href="#summary-anchor" class="btn-banner-3">
                    <img src="<?= $iconsFiche; ?>segment.png" alt="Icone" class="banner-icon3">
                    <p>Segment : <?= htmlspecialchars($ficheSegment['NOM_SEGMENT']); ?></p>
                </a>
                <a href="#summary-anchor" class="btn-banner-4">
                    <img src="<?= $iconsFiche; ?>fabrication-automobile.png" alt="Icone" class="banner-icon">
                    <p>Constructeur : <?= htmlspecialchars($constructeursNomsString); ?></p>
                </a>
                <a href="#summary-anchor" class="btn-banner-5">
                    <img src="<?= $iconsFiche; ?>automobile.png" alt="Icone" class="banner-icon2">
                    <p>Groupe automobile : <?= htmlspecialchars($groupesNomsString); ?></p>
                </a>
                <a href="#summary-anchor" class="btn-banner-12">
                    <img src="<?= $iconsFiche; ?>groupe.png" alt="Icone" class="banner-icon12">
                    <p>Génération / Phase : <?= htmlspecialchars($generation['NOM_GENERATION']); ?></p>
                </a>
                <?php if (isAdmin()): ?>
                    <a href="./pageModificationFiche.php?id_fiche=<?php echo htmlspecialchars($fiche_id); ?>" class="btn-banner-11">
                        <p>Modifier</p>
                    </a>
                <?php endif; ?>
                <a href="#histoire" class="btn-banner-8">
                    <img src="<?= $iconsFiche; ?>histoire.png" alt="Icone" class="banner-icon8">
                    <p>Histoire</p>
                </a>
                <a href="#technique" class="btn-banner-9">
                    <img src="<?= $iconsFiche; ?>technique.png" alt="Icone" class="banner-icon9">
                    <p>Technique</p>
                </a>
                <a href="#photo" class="btn-banner-10">
                    <img src="<?= $iconsFiche; ?>photo.png" alt="Icone" class="banner-icon10">
                    <p>Galerie photo</p>
                </a>
                <a href="#summary-anchor" class="btn-banner-6">
                    <img src="<?= $iconsFiche; ?>date.png" alt="Icone" class="banner-icon5">
                    <p>Période de production : <?= htmlspecialchars($ficheAnne['NOM_ANNEE']); ?> - <?= htmlspecialchars($ficheAnne2['NOM_ANNEE']); ?></p>
                </a>
                <a href="#summary-anchor" class="btn-banner-7">
                    <img src="<?= $iconsFiche; ?>pays.png" alt="Icone" class="banner-icon4">
                    <p>Pays : <?= $paysDisplay; ?></p>
                </a>
                <img src="<?= $cheminImage; ?>" alt="Car Photo" class="car-photo">
            </div>
        </div>
        <?php
    }
} else {
    echo '<p class="errorFicheNonTrouvee">Erreur 11 : Fiche non spécifiée.</p>';
}
        ?>


<!----------CARD---------->

<!--------------------------------------------MAIN------------------------------------------------------>
<main>

<?php
if(isset($_GET['id_fiche'] ) AND !empty($_GET['id_fiche'])){

        $fiche_id = $_GET['id_fiche'];

        $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_id));

        $ficheInfos = $getInfosOfThisFicheReq->fetch();

        if(!$ficheInfos){
                //echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
        }else{?>

        <div class="fiche-container">

            <article class="article-fiche-title" id="histoire">
                    <h1 class="h1-fiche">Histoire</h1>
            </article>
            <article class="histoire" id="histoire">
                <p class="p-fiche-histoire"><?= htmlspecialchars_decode($ficheInfos['HISTOIRE_FICHE']); ?></p>
            </article>

            <!----------------TABLEAU DES VERSIONS-------------->
            <article class="article-fiche-title" id="technique">
                    <h1 class="h1-fiche">Versions</h1>
            </article>

            <?php
            // Préparation et exécution de la requête pour récupérer toutes les lignes associées à la fiche


            // Vérifier s'il y a des lignes à afficher
            if (count($tabInfos) > 0) {
                echo '<div class="table-container">';
                echo '<div class="table-responsive">';
                echo '<table id="user_data" class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Appellation</th>';
                echo '<th class="col-carburant">Carburant</th>';
                echo '<th>Construction</th>';
                echo '<th>Moteur</th>';
                echo '<th>Cylindrée</th>';
                echo '<th>Performance</th>';
                echo '<th>Couple</th>';
                echo '<th>0-100</th>';
                echo '<th>Vitesse maximale</th>';
                echo '<th>Consommation</th>';
                echo '<th>Carrosserie</th>';
                echo '<th class="col-marche">Marché</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody id="table_body">';

                // Parcourir chaque ligne de résultats pour générer les lignes du tableau
                foreach ($tabInfos as $ligne) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($ligne['APPELLATION']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CARBURANT']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CONSTRUCTION_ANNEE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['NOM_MOTEUR']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CYLINDREE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['PERFORMANCE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['COUPLE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['ZERO_A_100']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['VMAX']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CONSOMMATION']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CARROSSERIE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['MARCHE_CONTINENT']) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
            } else {
                // Aucune ligne trouvée pour cette fiche
                echo 'Aucune donnée à afficher.';
            }
            ?>

            <article class="article-fiche-title" id="photos">
                    <h1 id="photo" class="h1-fiche">Galerie photo</h1>
            </article>

        </div>




    <!-- GALERIE -->

    <?php
    $fiche_id = $_GET['id_fiche'];

    $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
    $getInfosOfThisFicheReq->execute(array($fiche_id));

    $ficheInfos = $getInfosOfThisFicheReq->fetch();

    $getModele = $bdd->prepare('SELECT * FROM MODELE WHERE ID = ?');
    $getModele->execute(array($ficheInfos['ID_MODELE']));

    // Récupérer les photos associées à la fiche
    $getPhotos = $bdd->prepare('SELECT * FROM IMAGE WHERE ID_FICHE = ?');
    $getPhotos->execute(array($fiche_id));

    if (empty($getPhotos)) {
        ?>

        <div class="carrousel-container">
            <div class="main-image-container">
                <button class="nav-button left" onclick="previousImage()">&#10094;</button>
                <img id="main-image" class="main-image" src="<?= $cheminImage; ?>" alt="Main Image">
                <button class="nav-button right" onclick="nextImage()">&#10095;</button>
            </div>
        </div>
        <?php
    }else{


    // Initialiser l'image principale avec la première photo récupérée
    $firstPhoto = $getPhotos->fetch();

    // Vérifier si une image a été trouvée
    if ($firstPhoto) {
        $imageArray = [];
        $index = 0;

        // Ajouter la première image à la galerie
        $imageArray[] = "'../../library/voitures/" . htmlspecialchars($modele['NOM_MODELE']) . "/" . $firstPhoto['ID_FICHE'] . "/" . htmlspecialchars($firstPhoto['IMAGE_URL']) . "'";

        // Créer un tableau pour les autres photos
        $otherPhotos = [];
        while ($photo = $getPhotos->fetch()) {
            $otherPhotos[] = $photo;
        }

        ?>

        <div class="carrousel-container">
            <div class="main-image-container">
                <button class="nav-button left" onclick="previousImage()">&#10094;</button>
                <img id="main-image" class="main-image" src="../../library/voitures/<?= htmlspecialchars($modele['NOM_MODELE']); ?>/<?= $firstPhoto['ID_FICHE']; ?>/<?= htmlspecialchars($firstPhoto['IMAGE_URL']); ?>" alt="Main Image">
                <button class="nav-button right" onclick="nextImage()">&#10095;</button>
            </div>

            <!-- Gallery with the first three images -->
            <div class="gallery-container">
                <?php for ($i = 0; $i < min(3, count($otherPhotos)); $i++) :
                    $photo = $otherPhotos[$i];
                    $imageArray[] = "'../../library/voitures/" . htmlspecialchars($modele['NOM_MODELE']) . "/" . $photo['ID_FICHE'] . "/" . htmlspecialchars($photo['IMAGE_URL']) . "'";
                    ?>
                    <div class="img-thumbnail" onclick="showImage(<?= $i+1; ?>)">
                        <img src="../../library/voitures/<?= htmlspecialchars($modele['NOM_MODELE']); ?>/<?= $photo['ID_FICHE']; ?>/<?= htmlspecialchars($photo['IMAGE_URL']); ?>" alt="Thumbnail">
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Remaining images displayed below -->
        <div class="remaining-gallery">
            <?php
            // Afficher les autres images en dessous
            for ($i = 3; $i < count($otherPhotos); $i++) {
                $photo = $otherPhotos[$i];
                $imageArray[] = "'../../library/voitures/" . htmlspecialchars($modele['NOM_MODELE']) . "/" . $photo['ID_FICHE'] . "/" . htmlspecialchars($photo['IMAGE_URL']) . "'";
                ?>
                <div class="img-thumbnail-below" onclick="showImage(<?= $i+1; ?>)">
                    <img src="../../library/voitures/<?= htmlspecialchars($modele['NOM_MODELE']); ?>/<?= $photo['ID_FICHE']; ?>/<?= htmlspecialchars($photo['IMAGE_URL']); ?>" alt="Thumbnail">
                </div>
            <?php } ?>
        </div>

        <?php
    } // Fin de la vérification d'image
    ?>


        <?php
    }

            ?>

    <?php
    }
}else{
        //echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
}

        ?>
<br>


    <script>
        const images = [<?= implode(',', $imageArray); ?>];
    </script>
<script src="../scripts/scriptFiche/nav_carrousel.js"></script>

<br><br><br><br><br><br><br><br><br><br><br><br>

</main>

<!--------------------------------------------MAIN------------------------------------------------------>

<?php require '../includesHeaderFooter/includeFooter.php'; ?>

