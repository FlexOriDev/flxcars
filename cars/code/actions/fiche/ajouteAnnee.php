<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validateAnnee'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nomAnnee'])){
        
        $fiche_nom = htmlspecialchars($_POST['nomAnnee']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO annees(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('dashboard.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Année publiée.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}