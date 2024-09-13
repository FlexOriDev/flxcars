<?php
if (session_id() == '') {
    session_start();
}

// Ajouter les en-têtes HTTP de sécurité
header('Content-Security-Policy: default-src \'self\'');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

if (empty($_SESSION['csrf_token_register'])) {
    $_SESSION['csrf_token_register'] = bin2hex(random_bytes(32));
}

require('../actions/Database.php');

// Initialiser une variable pour les messages d'erreur
$errorMsg = '';

// Vérifier si la requête est une soumission de formulaire (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier le CSRF Token
    if (!isset($_POST['csrf_token_register']) || $_POST['csrf_token_register'] !== $_SESSION['csrf_token_register']) {
        $errorMsg = "Action non autorisée.";
    }

    if (empty($errorMsg)) {
        // Validation du formulaire
        if (isset($_POST['validate-register'])) {
            if (!empty($_POST['pseudo']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['passwordtwo'])) {
                if ($_POST['password'] === $_POST['passwordtwo']) {
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Sécurité des données
                    $user_pseudo = htmlspecialchars(trim($_POST['pseudo']));
                    if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $user_pseudo)) {
                        $errorMsg = "Le pseudo doit contenir entre 3 et 20 caractères alphanumériques ou des underscores.";
                    }

                    $user_prenom = htmlspecialchars(trim($_POST['prenom']));
                    if (!preg_match("/^[a-zA-Z]{3,20}$/", $user_prenom)) {
                        $errorMsg = "Le prénom doit contenir entre 3 et 20 caractères.";
                    }

                    $user_nom = htmlspecialchars(trim($_POST['nom']));
                    if (!preg_match("/^[a-zA-Z]{3,20}$/", $user_nom)) {
                        $errorMsg = "Le nom doit contenir entre 3 et 20 caractères.";
                    }

                    $user_mail = htmlspecialchars(trim($_POST['mail']));
                    if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {
                        $errorMsg = "Adresse email invalide.";
                    }

                    if (strlen($_POST['password']) < 8 || !preg_match("/[A-Z]/", $_POST['password']) || !preg_match("/[0-9]/", $_POST['password'])) {
                        $errorMsg = "Le mot de passe doit contenir au moins 8 caractères, incluant une majuscule et un chiffre.";
                    }
                    $user_password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    // Si aucune erreur, vérifier si l'utilisateur existe déjà
                    if (empty($errorMsg)) {
                        $checkIfUserAlreadyExists = $bdd->prepare('SELECT ID FROM UTILISATEUR WHERE MAIL_UTILISATEUR = ? OR PSEUDO_UTILISATEUR = ?');
                        $checkIfUserAlreadyExists->execute(array($user_mail, $user_pseudo));

                        if ($checkIfUserAlreadyExists->rowCount() == 0) {
                            // Insérer l'utilisateur dans la bdd
                            $insertUserOnWebsite = $bdd->prepare('INSERT INTO UTILISATEUR (PSEUDO_UTILISATEUR, PRENOM_UTILISATEUR, NOM_UTILISATEUR, MAIL_UTILISATEUR, PASSWORD_UTILISATEUR) VALUES (?, ?, ?, ?, ?)');
                            $insertUserOnWebsite->execute(array($user_pseudo, $user_prenom, $user_nom, $user_mail, $user_password));

                            // Récupérer les informations de l'utilisateur
                            $getInfosOfThisUserReq = $bdd->prepare('SELECT ID, PSEUDO_UTILISATEUR, PRENOM_UTILISATEUR, NOM_UTILISATEUR, MAIL_UTILISATEUR FROM UTILISATEUR WHERE MAIL_UTILISATEUR = ?');
                            $getInfosOfThisUserReq->execute(array($user_mail));

                            $usersInfos = $getInfosOfThisUserReq->fetch();

                            // Authentifier l'utilisateur et récupérer ses données dans des variables globales session
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
                    }
                } else {
                    $errorMsg = "Les mots de passe ne correspondent pas.";
                }
            } else {
                $errorMsg = "Veuillez compléter tous les champs...";
            }
        }
    }
}
?>
