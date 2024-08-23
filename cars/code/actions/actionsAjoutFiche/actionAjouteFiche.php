<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');



// Initialisation des variables avec les valeurs soumises
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$selectedType = isset($_POST['selectedType']) ? $_POST['selectedType'] : '';
$selectedAnneeSortie = isset($_POST['selectedAnneeSortie']) ? $_POST['selectedAnneeSortie'] : '';
$selectedAnneeFin = isset($_POST['selectedAnneeFin']) ? $_POST['selectedAnneeFin'] : '';
$selectedModele = isset($_POST['selectedModele']) ? $_POST['selectedModele'] : '';
$selectedSegment = isset($_POST['selectedSegment']) ? $_POST['selectedSegment'] : '';
$selectedConstructeur = isset($_POST['selectedConstructeur']) ? $_POST['selectedConstructeur'] : '';
$resume = isset($_POST['resume']) ? $_POST['resume'] : '';
$editor = isset($_POST['editor']) ? $_POST['editor'] : '';

function resizeAndFillImage($sourcePath, $destinationPath, $newWidth, $newHeight) {
    // Ouvrir l'image source
    $sourceImage = imagecreatefromjpeg($sourcePath);

    // Récupérer les dimensions de l'image d'origine
    $originalWidth = imagesx($sourceImage);
    $originalHeight = imagesy($sourceImage);

    // Créer une image vide avec la taille spécifiée et remplir avec du noir
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    $black = imagecolorallocate($newImage, 0, 0, 0);
    imagefill($newImage, 0, 0, $black);

    // Calculer le ratio de redimensionnement pour remplir l'image de destination
    $widthRatio = $newWidth / $originalWidth;
    $heightRatio = $newHeight / $originalHeight;

    // Choisir le ratio de redimensionnement maximal pour remplir l'image de destination
    $resizeRatio = max($widthRatio, $heightRatio);

    // Calculer les nouvelles dimensions de l'image
    $resizedWidth = $originalWidth * $resizeRatio;
    $resizedHeight = $originalHeight * $resizeRatio;

    // Calculer les coordonnées pour placer l'image d'origine au centre de l'image vide
    $x = ($newWidth - $resizedWidth) / 2;
    $y = ($newHeight - $resizedHeight) / 2;

    // Redimensionner et copier l'image source dans l'image vide
    imagecopyresampled($newImage, $sourceImage, $x, $y, 0, 0, $resizedWidth, $resizedHeight, $originalWidth, $originalHeight);

    // Sauvegarder l'image redimensionnée dans le dossier de destination
    imagejpeg($newImage, $destinationPath);

    // Libérer la mémoire
    imagedestroy($sourceImage);
    imagedestroy($newImage);
}

// Récupération des types sélectionnés (en tant que tableau)
$selectedTypes = isset($_POST['selectedTypes']) ? $_POST['selectedTypes'] : [];

$galleryImages = isset($_POST['galleryImagesInput']) ? json_decode($_POST['galleryImagesInput'], true) : [];

$imageCounter = 1;



// Validation du formulaire
if (isset($_POST['validate'])) {

    $imageCounter = 1;

    // Vérifier si l'utilisateur a bien complété tous les champs
    if (!empty($_POST['nom']) && !empty($selectedTypes) && !empty($_POST['selectedAnneeSortie'])
        && !empty($_POST['selectedAnneeFin']) && !empty($_POST['selectedModele']) && !empty($_POST['selectedSegment'])
        && !empty($_POST['selectedConstructeur']) && !empty($_POST['resume']) && !empty($_POST['editor'])
        && !empty($galleryImages)
        ) {

        $fiche_nom = htmlspecialchars($_POST['nom']);
        $fiche_annee_sortie = htmlspecialchars($_POST['selectedAnneeSortie']);
        $fiche_annee_fin = htmlspecialchars($_POST['selectedAnneeFin']);
        $fiche_modele = htmlspecialchars($_POST['selectedModele']);
        $fiche_segment = htmlspecialchars($_POST['selectedSegment']);
        $fiche_constructeur = htmlspecialchars($_POST['selectedConstructeur']);
        $fiche_resume = htmlspecialchars($_POST['resume']);
        $fiche_histoire = htmlspecialchars($_POST['editor']);
        $formated_DATETIME = date('Y-m-d H:i:s');

        // Insertion dans la table FICHE
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO FICHE (ID_CONSTRUCTEUR, ID_MODELE, ID_ANNEE_DEBUT, ID_ANNEE_FIN, ID_SEGMENT, NOM_FICHE, RESUME_FICHE, HISTOIRE_FICHE, DATE_AJOUT, ID_UTILISATEUR) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertFicheOnWebsite->execute(array($fiche_constructeur, $fiche_modele, $fiche_annee_sortie, $fiche_annee_fin, $fiche_segment, $fiche_nom, $fiche_resume, $fiche_histoire, $formated_DATETIME, $_SESSION['id']));

        // Récupérer l'ID de la fiche nouvellement insérée
        $fiche_id = $bdd->lastInsertId();

        // Insérer chaque type sélectionné dans la table FICHE_TYPE
        $insertFicheType = $bdd->prepare('INSERT INTO FICHE_TYPE (ID_FICHE, ID_TYPE) VALUES (?, ?)');
        foreach ($selectedTypes as $fiche_type) {
            $insertFicheType->execute(array($fiche_id, htmlspecialchars($fiche_type)));
        }

        // Récupérer le nom du modèle
        $getNomModele = $bdd->prepare('SELECT NOM_MODELE FROM MODELE WHERE ID = ?');
        $getNomModele->execute(array($fiche_modele));
        $modeleArray = $getNomModele->fetch();
        $modele = $modeleArray['NOM_MODELE'];

        // Traitement des images
        $imageCounter = 1; // Compteur d'images
        $destinationFolder = "../../library/voitures/" . $modele . "/" . $fiche_id . "/";

        foreach ($_FILES as $key => $file) {
            // Vérifier si le fichier correspond à un fichier d'image attendu
            if (preg_match('/^image(\d+)$/', $key, $matches)) {
                $imageIndex = $matches[1];
                $stringFiche = $fiche_id . "_" . $imageIndex . "_" . str_replace(' ', '_', $nom) . ".jpg";
                $nom_destination = $destinationFolder . $stringFiche;

                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0777, true);
                }

                if ($file['error'] == 0 && $file['tmp_name']) {
                    $sourcePath = $file['tmp_name'];
                    resizeAndFillImage($sourcePath, $nom_destination, 1920, 1080);

                    // Insérer les informations de l'image en base de données
                    $insertImgFiche = $bdd->prepare('INSERT INTO IMAGE (ID_FICHE, IMAGE_URL, ORDRE) VALUES (?, ?, ?)');
                    $insertImgFiche->execute([$fiche_id, $stringFiche, $imageIndex]);
                }
            }
        }
        //-----------------------


        // Insertion des versions (tableau)
        $appellations = $_POST['appellation'];
        $carburants = $_POST['carburant'];
        $constructions = $_POST['construction'];
        $moteurs = $_POST['moteur'];
        $cylindrees = $_POST['cylindree'];
        $performances = $_POST['performance'];
        $couples = $_POST['couple'];
        $zero_to_hundreds = $_POST['zero_to_hundred'];
        $vitesse_maxs = $_POST['vitesse_max'];
        $consommations = $_POST['consommation'];
        $carrosseries = $_POST['carrosserie'];
        $marches = $_POST['marche'];

        // Boucle sur les données du tableau
        $rowCount = count($appellations); // Nombre de lignes dans le tableau
        for ($i = 0; $i < $rowCount; $i++) {
            $appellation = $appellations[$i];
            $carburant = $carburants[$i];
            $construction = $constructions[$i];
            $moteur = $moteurs[$i];
            $cylindree = $cylindrees[$i];
            $performance = $performances[$i];
            $couple = $couples[$i];
            $zero_to_hundred = $zero_to_hundreds[$i];
            $vitesse_max = $vitesse_maxs[$i];
            $consommation = $consommations[$i];
            $carrosserie = $carrosseries[$i];
            $marche = $marches[$i];

            // Insertion dans la table VERSION
            $stmt = $bdd->prepare("INSERT INTO VERSION (ID_FICHE, APPELLATION, CARBURANT, CONSTRUCTION_ANNEE, NOM_MOTEUR, CYLINDREE, PERFORMANCE, COUPLE, ZERO_A_100, VMAX, CONSOMMATION, CARROSSERIE, MARCHE_CONTINENT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$fiche_id, $appellation, $carburant, $construction, $moteur, $cylindree, $performance, $couple, $zero_to_hundred, $vitesse_max, $consommation, $carrosserie, $marche]);
        }

        $url = htmlspecialchars('pageFiche.php?id_fiche=' . $fiche_id);
        echo '<script>window.location = "' . $url . '";</script>';
        $errorMsg = "Votre fiche a bien été publiée.";

    } else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
