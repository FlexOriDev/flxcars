<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nom']) AND !empty($_POST['resume']) AND !empty($_POST['description']) AND !empty($_POST['motorisation']) AND 
    !empty($_FILES['fichier']) AND !empty($_POST['id_constructeur']) AND !empty($_POST['id_type']) AND !empty($_POST['id_modele']) AND !empty($_POST['id_annee']) AND !empty($_POST['id_segment'])){
        
        $fiche_nom = htmlspecialchars($_POST['nom']);
        $fiche_resume = htmlspecialchars($_POST['resume']);
        $fiche_description = htmlspecialchars($_POST['description']);
        $fiche_motorisation = htmlspecialchars($_POST['motorisation']);
        $nom_fichier = $_FILES['fichier']['name'];
        $formated_DATETIME = date('Y-m-d H:i:s');
        $idConstructeur = htmlspecialchars($_POST['id_constructeur']);
        $idType = htmlspecialchars($_POST['id_type']);
        $idModele = htmlspecialchars($_POST['id_modele']);
        $idAnnee = htmlspecialchars($_POST['id_annee']);
        $idSegment = htmlspecialchars($_POST['id_segment']);
        
        $tmp_fichier = $_FILES['fichier']['tmp_name'];
        $nom_destination = "../../library/img/".$nom_fichier;
        move_uploaded_file($tmp_fichier,$nom_destination);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO fiches(nom, id_modele, id_annee, id_segment, resume, description, motorisation, image, date, id_constructeur, id_type, id_user)VALUES(?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertFicheOnWebsite->execute(array($fiche_nom, $idModele, $idAnnee, $idSegment, $fiche_resume, $fiche_description, $fiche_motorisation, $nom_fichier, $formated_DATETIME, $idConstructeur,$idType, $_SESSION['id']));
        
        $getInfosOfThisFicheReq = $bdd->prepare('SELECT id FROM fiches WHERE nom = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_nom));
        
        $ficheInfos = $getInfosOfThisFicheReq->fetch();
        
        $fiche_id = $ficheInfos['id'];
        

        

        $url = htmlspecialchars('ajouteFiche.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Votre fiche a bien été publiée.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}