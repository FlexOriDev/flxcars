<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['passwordtwo'])){
        
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_prenom = htmlspecialchars($_POST['prenom']);
        $user_nom = htmlspecialchars($_POST['nom']);
        $user_mail = htmlspecialchars($_POST['mail']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        //Vérifier si l'utilisateur existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
        $checkIfUserAlreadyExists->execute(array($user_mail));

        $checkIfUserAlreadyExists2 = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists2->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0 XOR $checkIfUserAlreadyExists->rowCount() == 0){
            
            //Insérer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, prenom, nom, mail, password)VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_prenom, $user_nom, $user_mail, $user_password));
            
            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, prenom, nom, mail FROM users WHERE pseudo = ? AND prenom = ? AND nom = ? AND mail = ?');
            $getInfosOfThisUserReq->execute(array($user_pseudo, $user_prenom, $user_nom, $user_mail));
            
            $usersInfos = $getInfosOfThisUserReq->fetch();
            
            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['prenom'] = $usersInfos['prenom'];
            $_SESSION['nom'] = $usersInfos['nom'];
            $_SESSION['mail'] = $usersInfos['mail'];
            
            
      
            $url = htmlspecialchars("index.php");
            echo '<script>window.location = "'.$url.'";</script>';
        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}