<?php
if(session_id() == '') {
    session_start();
}
require('../actions/Database.php');
require('../actions/actionsUser/actionIsAdmin.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);
        
        //Vérifier si l'utilisateur existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE PSEUDO_UTILISATEUR = ?');
        $checkIfUserExists->execute(array($user_pseudo));
        
        if($checkIfUserExists->rowCount() > 0){
            
            //Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();
            
            //Vérifier si le mot de passe est correct
            if(password_verify($user_password, $usersInfos['PASSWORD_UTILISATEUR'])){
                
                //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['ID'];
                $_SESSION['pseudo'] = $usersInfos['PSEUDO_UTILISATEUR'];
                $_SESSION['prenom'] = $usersInfos['PRENOM_UTILISATEUR'];
                $_SESSION['nom'] = $usersInfos['NOM_UTILISATEUR'];
                $_SESSION['mail'] = $usersInfos['MAIL_UTILISATEUR'];
                $_SESSION['role'] = $usersInfos['ROLE_UTILISATEUR'];

                if(isAdmin()){
                    header('Location: pageVoitures.php');
                }else{
                    //Rediriger l'utilisateur vers la page d'accueil
                    header('Location: pageIndex.php');
                }
                
            }else{
                $errorMsg = "Votre mot de passe est incorrect...";
            }
            
        }else{
            $errorMsg = "Utilisateur non trouvé.";
        }
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}