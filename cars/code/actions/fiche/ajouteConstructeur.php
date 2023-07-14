<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nom'])){
        
        $fiche_nom = htmlspecialchars($_POST['nom']);
        
        $insertFicheOnWebsite = $bdd->prepare('INSERT INTO constructeurs(nom)VALUES(?)');
        $insertFicheOnWebsite->execute(array($fiche_nom));
        

        

        $url = htmlspecialchars('ajouteConstructeur.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Constructeur publié.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}