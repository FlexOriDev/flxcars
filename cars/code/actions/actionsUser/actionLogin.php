<?php
if (session_id() == '') {
    session_start();
}

// Ajouter les en-têtes HTTP de sécurité
//header('Content-Security-Policy: default-src \'self\'');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

require('../actions/Database.php');
require('../actions/actionsUser/actionIsAdmin.php');

// Ajouter un token CSRF pour la connexion
if (empty($_SESSION['csrf_token_login'])) {
    $_SESSION['csrf_token_login'] = bin2hex(random_bytes(32));
}

// Initialiser une variable pour les messages d'erreur
$errorMsg = '';

// Validation du formulaire
if (isset($_POST['validate-login'])) {

    // Vérifier le CSRF Token
    if (!isset($_POST['csrf_token_login']) || $_POST['csrf_token_login'] !== $_SESSION['csrf_token_login']) {
        $errorMsg = "Action non autorisée.";
    }

    if (empty($errorMsg)) {
        // Vérifier si l'utilisateur a bien complété tous les champs
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

            // Sécuriser les données de l'utilisateur
            $user_pseudo = htmlspecialchars(trim($_POST['pseudo']));
            $user_password = htmlspecialchars(trim($_POST['password']));

            // Vérifier si l'utilisateur existe
            $checkIfUserExists = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE PSEUDO_UTILISATEUR = ?');
            $checkIfUserExists->execute(array($user_pseudo));

            if ($checkIfUserExists->rowCount() > 0) {
                // Récupérer les données de l'utilisateur
                $usersInfos = $checkIfUserExists->fetch();

                // Vérifier si le mot de passe est correct
                if (password_verify($user_password, $usersInfos['PASSWORD_UTILISATEUR'])) {
                    // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales session
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $usersInfos['ID'];
                    $_SESSION['pseudo'] = $usersInfos['PSEUDO_UTILISATEUR'];
                    $_SESSION['prenom'] = $usersInfos['PRENOM_UTILISATEUR'];
                    $_SESSION['nom'] = $usersInfos['NOM_UTILISATEUR'];
                    $_SESSION['mail'] = $usersInfos['MAIL_UTILISATEUR'];
                    $_SESSION['role'] = $usersInfos['ROLE_UTILISATEUR'];

                    if (isAdmin()) {
                        header('Location: pageVoitures.php');
                    } else {
                        // Rediriger l'utilisateur vers la page d'accueil
                        header('Location: pageIndex.php');
                    }
                    exit;
                } else {
                    $errorMsg = "Votre mot de passe est incorrect.";
                }
            } else {
                $errorMsg = "Utilisateur non trouvé.";
            }
        } else {
            $errorMsg = "Veuillez compléter tous les champs.";
        }
    }
}
?>
