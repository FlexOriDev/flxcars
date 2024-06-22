<?php
if(session_id() == '') {
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



//Validation du formulaire
if(isset($_POST['validate'])){



    // Ajoutez des vérifications similaires pour les autres champs du formulaire...


    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nom']) AND !empty($_POST['selectedType']) AND !empty($_POST['selectedAnneeSortie']) 
        AND !empty($_POST['selectedAnneeFin']) AND !empty($_POST['selectedModele']) AND !empty($_POST['selectedSegment'])
        AND !empty($_POST['selectedConstructeur']) AND !empty($_POST['resume']) AND !empty($_POST['editor'])

        AND !empty($_FILES['image1']) AND $_FILES['image1']['error'] == 0){

        
        
        $fiche_nom = htmlspecialchars($_POST['nom']);

        $fiche_type = htmlspecialchars($_POST['selectedType']);
        $fiche_annee_sortie = htmlspecialchars($_POST['selectedAnneeSortie']);
        $fiche_annee_fin = htmlspecialchars($_POST['selectedAnneeFin']);
        $fiche_modele = htmlspecialchars($_POST['selectedModele']);
        $fiche_segment = htmlspecialchars($_POST['selectedSegment']);
        $fiche_constructeur = htmlspecialchars($_POST['selectedConstructeur']);

        $fiche_resume = htmlspecialchars($_POST['resume']);
        $fiche_histoire = htmlspecialchars($_POST['editor']);

        $formated_DATETIME = date('Y-m-d H:i:s');
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO fiches(id_constructeur, id_type, id_modele, id_annee, id_annee_fin, 
        id_segment, nom, resume, histoire, date, id_user)VALUES(?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertFicheOnWebsite->execute(array($fiche_constructeur, $fiche_type, $fiche_modele, $fiche_annee_sortie, $fiche_annee_fin, 
        $fiche_segment, $fiche_nom, $fiche_resume, $fiche_histoire,$formated_DATETIME, $_SESSION['id']));
        
        //IMAGES

        $getInfosOfThisFicheReq = $bdd->prepare('SELECT id FROM fiches WHERE nom = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_nom));
        
        $ficheInfos = $getInfosOfThisFicheReq->fetch();
        
        $fiche_id = $ficheInfos['id'];

        $getNomModele = $bdd->prepare('SELECT nom FROM modeles WHERE id = ?');
        $getNomModele->execute(array($fiche_modele));
        $modeleArray = $getNomModele->fetch();
        $modele = $modeleArray['nom'];



        $stringFiche = $fiche_id."_1_".$fiche_nom.".jpg";
        $resStringFiche = str_replace(' ', '_', $stringFiche);

        $tmp_fichier = $_FILES['image1']['tmp_name'];
        $nom_destination = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche;
        // Créer le dossier de destination s'il n'existe pas déjà
        if (!file_exists("../../library/voitures/$modele/$fiche_id/")) {
            mkdir("../../library/voitures/$modele/$fiche_id/", 0777, true);
        }

        // Redimensionner et remplir l'image avant de la déplacer
        resizeAndFillImage($tmp_fichier, $nom_destination, 1920, 1080);

        $nameImg1 = $resStringFiche;
        $nameImg2 = "";
        $nameImg3 = "";
        $nameImg4 = "";
        $nameImg5 = "";
        $nameImg6 = "";
        
        if(isset($_FILES['image2']) AND $_FILES['image2']['error'] == 0){
            $nom_fichier2 = $_FILES['image2']['tmp_name'];
            $stringFiche2 = $fiche_id."_2_".$fiche_nom.".jpg";
            $resStringFiche2 = str_replace(' ', '_', $stringFiche2);
            $nom_destination2 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche2;
            resizeAndFillImage($nom_fichier2, $nom_destination2, 1920, 1080);
            $nameImg2 = $resStringFiche2;
        }else{
            $nameImg2 = "";
        }

        if(isset($_FILES['image3']) AND $_FILES['image3']['error'] == 0){
            $nom_fichier3 = $_FILES['image3']['tmp_name'];
            $stringFiche3 = $fiche_id."_3_".$fiche_nom.".jpg";
            $resStringFiche3 = str_replace(' ', '_', $stringFiche3);
            $nom_destination3 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche3;
            resizeAndFillImage($nom_fichier3, $nom_destination3, 1920, 1080);
            $nameImg3 = $resStringFiche3;
        }else{
            $nameImg3 = "";
        }

        if(isset($_FILES['image4']) AND $_FILES['image4']['error'] == 0){
            $nom_fichier4 = $_FILES['image4']['tmp_name'];
            $stringFiche4 = $fiche_id."_4_".$fiche_nom.".jpg";
            $resStringFiche4 = str_replace(' ', '_', $stringFiche4);
            $nom_destination4 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche4;
            resizeAndFillImage($nom_fichier4, $nom_destination4, 1920, 1080);
            $nameImg4 = $resStringFiche4;
        }else{
            $nameImg4 = "";
        }

        if(isset($_FILES['image5']) AND $_FILES['image5']['error'] == 0){
            $nom_fichier5 = $_FILES['image5']['tmp_name'];
            $stringFiche5 = $fiche_id."_5_".$fiche_nom.".jpg";
            $resStringFiche5 = str_replace(' ', '_', $stringFiche5);
            $nom_destination5 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche5;
            resizeAndFillImage($nom_fichier5, $nom_destination5, 1920, 1080);
            $nameImg5 = $resStringFiche5;
        }else{
            $nameImg5 = "";
        }

        if(isset($_FILES['image6']) AND $_FILES['image6']['error'] == 0){
            $nom_fichier6 = $_FILES['image6']['tmp_name'];
            $stringFiche6 = $fiche_id."_6_".$fiche_nom.".jpg";
            $resStringFiche6 = str_replace(' ', '_', $stringFiche6);
            $nom_destination6 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche6;
            resizeAndFillImage($nom_fichier6, $nom_destination6, 1920, 1080);
            $nameImg6 = $resStringFiche6;
        }else{
            $nameImg6 = "";
        }

        $insertImgFiche = $bdd->prepare('INSERT INTO imagesfiche(img_1, img_2, img_3, img_4, img_5, id_fiche, id_modele) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insertImgFiche->execute(array($nameImg1, $nameImg2, $nameImg3, $nameImg4, $nameImg5, $fiche_id, $fiche_modele));

        //TABLEAUX

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
        // Et ainsi de suite pour les autres champs du tableau

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
            // Récupérer les autres champs de la même manière

            // Maintenant vous pouvez utiliser ces valeurs comme vous le souhaitez, par exemple les insérer dans la base de données
            // Exemple d'insertion dans une base de données avec PDO
            $stmt = $bdd->prepare("INSERT INTO motorisationsessence (id_fiche, appellation, carburant, 
            construction, moteur, cylindree, performance, couple, zero_to_hundred, vmax, conso, carrosserie, marche) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$fiche_id, $appellation, $carburant, $construction, $moteur, $cylindree, $performance, $couple, $zero_to_hundred, $vitesse_max, $consommation, $carrosserie, $marche ]);
            // Insérez d'autres champs si nécessaire
        }

        $url = htmlspecialchars('pageFiche.php?id_fiche='.$fiche_id);
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Votre fiche a bien été publiée.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}