<?php
// Démarrer la session
if (session_id() == '') {
    session_start();
}

// Vérifier le token CSRF pour éviter les déconnexions involontaires
if (isset($_POST['csrf_token_login']) && $_POST['csrf_token_login'] === $_SESSION['csrf_token_login']) {
    // Détruire toutes les variables de session
    $_SESSION = [];

    // Détruire la session
    session_destroy();

    // Rediriger vers la page d'accueil
    header('Location: ../../pages/pageIndex.php');
    exit;
} else {
    // Gérer le cas d'une demande de déconnexion non autorisée
    header('HTTP/1.1 403 Forbidden');
    echo "Action non autorisée.";
    exit;
}
?>
