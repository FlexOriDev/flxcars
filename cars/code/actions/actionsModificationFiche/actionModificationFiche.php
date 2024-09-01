<?php
if (session_id() == '') {
    session_start();
}
// Connexion à la base de données
require('../actions/database.php');
require('../actions/utils/pictures.php');
//-------------------------------MODIFICATION BDD------------------------------------//

$selectedTypes = isset($_POST['selectedTypes']) ? $_POST['selectedTypes'] : [];
// Validation du formulaire
if (isset($_POST['validate'])) {


    if(!empty($_POST['nom']) && !empty($selectedTypes) && !empty($_POST['selectedAnneeSortie'])
        && !empty($_POST['selectedAnneeFin']) && !empty($_POST['selectedModele']) && !empty($_POST['selectedSegment'])
        && !empty($_POST['selectedConstructeur']) && !empty($_POST['resume']) && !empty($_POST['editor'])
    ){
        //-------------------------------FICHE INSERT------------------------------------//
        //definition des champs à inserer
        $fiche_nom = htmlspecialchars($_POST['nom']);
        $fiche_annee_sortie = htmlspecialchars($_POST['selectedAnneeSortie']);
        $fiche_annee_fin = htmlspecialchars($_POST['selectedAnneeFin']);
        $fiche_modele = htmlspecialchars($_POST['selectedModele']);
        $fiche_segment = htmlspecialchars($_POST['selectedSegment']);
        $fiche_constructeur = htmlspecialchars($_POST['selectedConstructeur']);
        $fiche_resume = htmlspecialchars($_POST['resume']);
        $fiche_histoire = $_POST['editor'];
        $formated_DATETIME = date('Y-m-d H:i:s');

        // Insertion dans la table FICHE

        $sql = "UPDATE FICHE SET ID_CONSTRUCTEUR = :ID_CONSTRUCTEUR, 
                 ID_MODELE = :ID_MODELE, 
                 ID_ANNEE_DEBUT = :ID_ANNEE_DEBUT, 
                 ID_ANNEE_FIN = :ID_ANNEE_FIN, 
                 ID_SEGMENT = :ID_SEGMENT, 
                 NOM_FICHE = :NOM_FICHE, 
                 RESUME_FICHE = :RESUME_FICHE, 
                 HISTOIRE_FICHE = :HISTOIRE_FICHE, 
                 DATE_AJOUT = :DATE_AJOUT, 
                 ID_UTILISATEUR = :ID_UTILISATEUR 
             WHERE id = :id";

        $stmt = $bdd->prepare($sql);

        $stmt->bindParam(':ID_CONSTRUCTEUR', $fiche_constructeur);
        $stmt->bindParam(':ID_MODELE', $fiche_modele);
        $stmt->bindParam(':ID_ANNEE_DEBUT', $fiche_annee_sortie);
        $stmt->bindParam(':ID_ANNEE_FIN', $fiche_annee_fin);
        $stmt->bindParam(':ID_SEGMENT', $fiche_segment);
        $stmt->bindParam(':NOM_FICHE', $fiche_nom);
        $stmt->bindParam(':RESUME_FICHE', $fiche_resume);
        $stmt->bindParam(':HISTOIRE_FICHE', $fiche_histoire);
        $stmt->bindParam(':DATE_AJOUT', $formated_DATETIME);
        $stmt->bindParam(':ID_UTILISATEUR', $_SESSION['id']);
        $stmt->bindParam(':id', $idFiche);

        $stmt->execute();

        //-------------------------------TYPES INSERT------------------------------------//

        // Insérer chaque type sélectionné dans la table FICHE_TYPE
        $insertFicheType = $bdd->prepare('INSERT INTO FICHE_TYPE (ID_FICHE, ID_TYPE) VALUES (?, ?)');
        foreach ($selectedTypes as $fiche_type) {
            $insertFicheType->execute(array($idFiche, htmlspecialchars($fiche_type)));
        }

        //-------------------------------VERIONS INSERT------------------------------------//

        // Insertion des versions (tableau)
        $ids = $_POST['id'];
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

        // Récupérer les IDs des lignes à supprimer
        $idsToDelete = isset($_POST['ids_to_delete']) ? explode(',', $_POST['ids_to_delete']) : [];

        // Supprimer les lignes marquées pour suppression
        foreach ($idsToDelete as $idToDelete) {
            if (!empty($idToDelete)) {
                $stmt = $bdd->prepare("DELETE FROM VERSION WHERE ID = ?");
                $stmt->execute([$idToDelete]);
            }
        }

        // Boucle sur les données du tableau
        $rowCount = count($appellations); // Nombre de lignes dans le tableau
        for ($i = 0; $i < $rowCount; $i++) {
            $id = $ids[$i]; // ID de la version
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

            if (!empty($id)) {
                // Mise à jour de la version existante
                $stmt = $bdd->prepare("UPDATE VERSION SET APPELLATION = ?, CARBURANT = ?, CONSTRUCTION_ANNEE = ?, NOM_MOTEUR = ?, CYLINDREE = ?, PERFORMANCE = ?, COUPLE = ?, ZERO_A_100 = ?, VMAX = ?, CONSOMMATION = ?, CARROSSERIE = ?, MARCHE_CONTINENT = ? WHERE ID = ?");
                $stmt->execute([$appellation, $carburant, $construction, $moteur, $cylindree, $performance, $couple, $zero_to_hundred, $vitesse_max, $consommation, $carrosserie, $marche, $id]);
            } else {
                // Insertion d'une nouvelle version
                $stmt = $bdd->prepare("INSERT INTO VERSION (ID_FICHE, APPELLATION, CARBURANT, CONSTRUCTION_ANNEE, NOM_MOTEUR, CYLINDREE, PERFORMANCE, COUPLE, ZERO_A_100, VMAX, CONSOMMATION, CARROSSERIE, MARCHE_CONTINENT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$idFiche, $appellation, $carburant, $construction, $moteur, $cylindree, $performance, $couple, $zero_to_hundred, $vitesse_max, $consommation, $carrosserie, $marche]);
            }
        }
            //-------------------------------IMAGES------------------------------------//

            // Requête pour obtenir les images existantes de la fiche
            $getImages = $bdd->prepare('SELECT ID, IMAGE_URL FROM IMAGE WHERE ID_FICHE = ?');
            $getImages->execute([$idFiche]);
            $existingImages = $getImages->fetchAll(PDO::FETCH_ASSOC);

            // Récupérer le nom du modèle
            $getNomModele = $bdd->prepare('SELECT NOM_MODELE FROM MODELE WHERE ID = ?');
            $getNomModele->execute(array($fiche_modele));
            $modeleArray = $getNomModele->fetch();
            $modele = $modeleArray['NOM_MODELE'];

            // Obtenir les IDs des images à supprimer depuis le formulaire
            $deletedImages = isset($_POST['deletedImagesInput']) ? json_decode($_POST['deletedImagesInput'], true) : [];

            // Initialiser la liste des images soumises avec les images existantes
            $submittedImages = array_map(function($image) {
                return $image['IMAGE_URL'];
            }, $existingImages);

            // Créer une liste des noms d'images soumises
            foreach ($_FILES as $key => $file) {
                echo 'RATIO : '.$key;
                if (preg_match('/^image(\d+)$/', $key, $matches)) {
                    $imageIndex = $matches[1];
                    $submittedImages[] = $idFiche . "_" . $imageIndex . "_" . str_replace(' ', '_', $fiche_nom) . ".jpg";
                }
            }

            foreach ($existingImages as $existingImage) {
                // Si l'image n'est pas dans la liste des images soumises et qu'elle est marquée pour suppression
                if (!in_array($existingImage['IMAGE_URL'], $submittedImages) || in_array($existingImage['ID'], $deletedImages)) {
                    // Supprimer l'image du répertoire
                    $imagePath = "../../library/voitures/" . $modele . "/" . $idFiche . "/" . $existingImage['IMAGE_URL'];
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                    // Supprimer l'image de la base de données
                    $deleteImage = $bdd->prepare('DELETE FROM IMAGE WHERE ID = ?');
                    $deleteImage->execute([$existingImage['ID']]);
                }
            }

            $imageCounter = 1; // Compteur d'images
            $destinationFolder = "../../library/voitures/" . $modele . "/" . $idFiche . "/";
            foreach ($_FILES as $key => $file) {
                if (preg_match('/^image(\d+)$/', $key, $matches)) {
                    $imageIndex = $matches[1];
                    $stringFiche = $idFiche . "_" . $imageIndex . "_" . str_replace(' ', '_', $fiche_nom) . ".jpg";
                    $nom_destination = $destinationFolder . $stringFiche;

                    if (!file_exists($destinationFolder)) {
                        mkdir($destinationFolder, 0777, true);
                    }

                    if ($file['error'] == 0 && $file['tmp_name']) {
                        $sourcePath = $file['tmp_name'];
                        resizeAndFillImage($sourcePath, $nom_destination, 1920, 1080);

                        // Insérer les informations de l'image en base de données si elles n'existent pas déjà
                        $insertImgFiche = $bdd->prepare('INSERT INTO IMAGE (ID_FICHE, IMAGE_URL, ORDRE) VALUES (?, ?, ?)');
                        $insertImgFiche->execute([$idFiche, $stringFiche, $imageIndex]);
                    }
                }
            }

            //-------------------------------REDIRECTION------------------------------------//

            $url = htmlspecialchars('pageFiche.php?id_fiche=' . $idFiche);
            echo '<script>window.location = "' . $url . '";</script>';
            $errorMsg = "Votre fiche a bien été modifée.";
    }else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}else{
    //echo'<p class="debug">non validé </p>';
}

