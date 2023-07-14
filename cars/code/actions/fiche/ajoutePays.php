<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validatePays'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nomPays'])){
        
        $fiche_nom = htmlspecialchars($_POST['nomPays']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO pays(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('dashboard.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Pays publié.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}