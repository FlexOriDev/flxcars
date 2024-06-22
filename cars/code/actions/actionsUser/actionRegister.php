<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

// Validation du formulaire
if (isset($_POST['validate'])) {

    // Vérifier si l'utilisateur a bien complété tous les champs
    if (!empty($_POST['pseudo']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['passwordtwo'])) {

        // Vérifier si les mots de passe correspondent
        if ($_POST['password'] === $_POST['passwordtwo']) {

            // Les données de l'utilisateur
            $user_pseudo = htmlspecialchars($_POST['pseudo']);
            $user_prenom = htmlspecialchars($_POST['prenom']);
            $user_nom = htmlspecialchars($_POST['nom']);
            $user_mail = htmlspecialchars($_POST['mail']);
            $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Vérifier si l'utilisateur existe déjà par email ou pseudo
            $checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM users WHERE mail = ? OR pseudo = ?');
            $checkIfUserAlreadyExists->execute(array($user_mail, $user_pseudo));

            if ($checkIfUserAlreadyExists->rowCount() == 0) {

                // Insérer l'utilisateur dans la bdd
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, prenom, nom, mail, password) VALUES(?, ?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_pseudo, $user_prenom, $user_nom, $user_mail, $user_password));

                // Récupérer les informations de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, prenom, nom, mail FROM users WHERE mail = ?');
                $getInfosOfThisUserReq->execute(array($user_mail));

                $usersInfos = $getInfosOfThisUserReq->fetch();

                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];
                $_SESSION['prenom'] = $usersInfos['prenom'];
                $_SESSION['nom'] = $usersInfos['nom'];
                $_SESSION['mail'] = $usersInfos['mail'];

                // Redirection vers la page d'accueil
                $url = htmlspecialchars("pageIndex.php");
                echo '<script>window.location = "'.$url.'";</script>';
                exit;
            } else {
                $errorMsg = "L'utilisateur existe déjà sur le site";
            }
        } else {
            $errorMsg = "Les mots de passe ne correspondent pas.";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
?>
