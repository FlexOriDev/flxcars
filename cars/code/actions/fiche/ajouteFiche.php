<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nom']) AND !empty($_POST['resume']) AND !empty($_POST['description']) AND !empty($_POST['motorisation']) AND 
    $_FILES['fichier_1']['size'] != 0  AND !empty($_POST['id_constructeur']) AND !empty($_POST['id_type']) AND !empty($_POST['id_modele']) AND !empty($_POST['id_annee']) AND !empty($_POST['id_segment'])){
        
        $fiche_nom = htmlspecialchars($_POST['nom']);
        $fiche_resume = htmlspecialchars($_POST['resume']);
        $fiche_description = htmlspecialchars($_POST['description']);
        $fiche_motorisation = htmlspecialchars($_POST['motorisation']);
        $nom_fichier = $_FILES['fichier_1']['name'];
        $formated_DATETIME = date('Y-m-d H:i:s');
        $idConstructeur = htmlspecialchars($_POST['id_constructeur']);
        $idType = htmlspecialchars($_POST['id_type']);
        $idModele = htmlspecialchars($_POST['id_modele']);
        $idAnnee = htmlspecialchars($_POST['id_annee']);
        $idSegment = htmlspecialchars($_POST['id_segment']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO fiches(nom, id_modele, id_annee, id_segment, resume, description, motorisation, date, id_constructeur, id_type, id_user, image)VALUES(?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertFicheOnWebsite->execute(array($fiche_nom, $idModele, $idAnnee, $idSegment, $fiche_resume, $fiche_description, $fiche_motorisation, $formated_DATETIME, $idConstructeur,$idType, $_SESSION['id'],$nom_fichier));
        
        $getInfosOfThisFicheReq = $bdd->prepare('SELECT id FROM fiches WHERE nom = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_nom));
        
        $ficheInfos = $getInfosOfThisFicheReq->fetch();
        
        $fiche_id = $ficheInfos['id'];

        $getNomModele = $bdd->prepare('SELECT nom FROM modeles WHERE id = ?');
        $getNomModele->execute(array($idModele));
        $modeleArray = $getNomModele->fetch();
        $modele = $modeleArray['nom'];


        $stringFiche = $fiche_id."_1_".$fiche_nom.".jpg";
        $resStringFiche = str_replace(' ', '_', $stringFiche);
        
        $tmp_fichier = $_FILES['fichier_1']['tmp_name'];
        mkdir("../../library/voitures/$modele/$fiche_id/", 0777, true);
        $nom_destination = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche;
        move_uploaded_file($tmp_fichier,$nom_destination);

        $nameImg1 = $resStringFiche;
        $nameImg2 = "";
        $nameImg3 = "";
        $nameImg4 = "";
        $nameImg5 = "";

        $insertFicheOnWebsite = $bdd->prepare('UPDATE fiches set image = ? WHERE id = ?');
        $insertFicheOnWebsite->execute(array($resStringFiche, $fiche_id));
        
        if(isset($_FILES['fichier_2']) AND $_FILES['fichier_2']['error'] == 0){
            $nom_fichier2 = $_FILES['fichier_2']['tmp_name'];
            $stringFiche2 = $fiche_id."_2_".$fiche_nom.".jpg";
            $resStringFiche2 = str_replace(' ', '_', $stringFiche2);
            $nom_destination2 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche2;
            move_uploaded_file($nom_fichier2,$nom_destination2);
            $nameImg2 = $resStringFiche2;
        }else{
            $nameImg2 = "";
        }

        if(isset($_FILES['fichier_3']) AND $_FILES['fichier_3']['error'] == 0){
            $nom_fichier3 = $_FILES['fichier_3']['tmp_name'];
            $stringFiche3 = $fiche_id."_3_".$fiche_nom.".jpg";
            $resStringFiche3 = str_replace(' ', '_', $stringFiche3);
            $nom_destination3 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche3;
            move_uploaded_file($nom_fichier3,$nom_destination3);
            $nameImg3 = $resStringFiche3;
        }else{
            $nameImg3 = "";
        }

        if(isset($_FILES['fichier_4']) AND $_FILES['fichier_4']['error'] == 0){
            $nom_fichier4 = $_FILES['fichier_4']['tmp_name'];
            $stringFiche4 = $fiche_id."_4_".$fiche_nom.".jpg";
            $resStringFiche4 = str_replace(' ', '_', $stringFiche4);
            $nom_destination4 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche4;
            move_uploaded_file($nom_fichier4,$nom_destination4);
            $nameImg4 = $resStringFiche4;
        }else{
            $nameImg4 = "";
        }

        if(isset($_FILES['fichier_5']) AND $_FILES['fichier_5']['error'] == 0){
            $nom_fichier5 = $_FILES['fichier_5']['tmp_name'];
            $stringFiche5 = $fiche_id."_5_".$fiche_nom.".jpg";
            $resStringFiche5 = str_replace(' ', '_', $stringFiche5);
            $nom_destination5 = "../../library/voitures/".$modele."/".$fiche_id."/".$resStringFiche5;
            move_uploaded_file($nom_fichier5,$nom_destination5);
            $nameImg5 = $resStringFiche5;
        }else{
            $nameImg5 = "";
        }

        $insertImgFiche = $bdd->prepare('INSERT INTO imagesfiche(img_1, img_2, img_3, img_4, img_5, id_fiche, id_modele) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insertImgFiche->execute(array($nameImg1, $nameImg2, $nameImg3, $nameImg4, $nameImg5, $fiche_id, $idModele));

        $url = htmlspecialchars('ajouteFiche.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Votre fiche a bien été publiée.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}