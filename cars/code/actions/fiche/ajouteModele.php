<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validateModele'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nomModele'])){
        
        $fiche_nom = htmlspecialchars($_POST['nomModele']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO modeles(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('ajouteFiche.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsgModele = "Modele publié.";

    }else{
        $errorMsgModele = "Veuillez compléter tous les champs...";
    }
    
}