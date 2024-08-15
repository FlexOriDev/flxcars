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
            $user_pseudo = htmlspecialchars(trim($_POST['pseudo']));
            $user_prenom = htmlspecialchars(trim($_POST['prenom']));
            $user_nom = htmlspecialchars(trim($_POST['nom']));
            $user_mail = htmlspecialchars(trim($_POST['mail']));
            $user_password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

            // Vérifier si l'utilisateur existe déjà par email ou pseudo
            $checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE MAIL_UTILISATEUR = ? OR PSEUDO_UTILISATEUR = ?');
            $checkIfUserAlreadyExists->execute(array($user_mail, $user_pseudo));

            if ($checkIfUserAlreadyExists->rowCount() == 0) {

                // Insérer l'utilisateur dans la bdd
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO UTILISATEUR (PSEUDO_UTILISATEUR, PRENOM_UTILISATEUR, NOM_UTILISATEUR, MAIL_UTILISATEUR, PASSWORD_UTILISATEUR) VALUES (?, ?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_pseudo, $user_prenom, $user_nom, $user_mail, $user_password));

                // Récupérer les informations de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT ID, PSEUDO_UTILISATEUR, PRENOM_UTILISATEUR, NOM_UTILISATEUR, MAIL_UTILISATEUR FROM UTILISATEUR WHERE MAIL_UTILISATEUR = ?');
                $getInfosOfThisUserReq->execute(array($user_mail));

                $usersInfos = $getInfosOfThisUserReq->fetch();

                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['ID'];
                $_SESSION['pseudo'] = $usersInfos['PSEUDO_UTILISATEUR'];
                $_SESSION['prenom'] = $usersInfos['PRENOM_UTILISATEUR'];
                $_SESSION['nom'] = $usersInfos['NOM_UTILISATEUR'];
                $_SESSION['mail'] = $usersInfos['MAIL_UTILISATEUR'];

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
