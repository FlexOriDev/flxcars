<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validateType'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nomType'])){
        
        $fiche_nom = htmlspecialchars($_POST['nomType']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO types(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('dashboard.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Type publié.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}