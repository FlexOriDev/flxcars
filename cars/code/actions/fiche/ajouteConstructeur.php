<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validateConstructeur'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nomConstructeur'])){
        
        $fiche_nom = htmlspecialchars($_POST['nomConstructeur']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO constructeurs(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('dashboard.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Constructeur publié.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}