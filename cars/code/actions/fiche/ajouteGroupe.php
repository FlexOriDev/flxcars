<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validateGroupe'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nomGroupe'])){
        
        $fiche_nom = htmlspecialchars($_POST['nomGroupe']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO groupes(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('dashboard.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Groupe publié.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}