<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    $deleteConstructeur = $bdd->prepare('DELETE FROM UTILISATEUR WHERE id = ?');
    $deleteConstructeur->execute(array($deleteId));
    $url = htmlspecialchars('pageDashboardUtilisateurs.php');
    echo '<script>window.location = "'.$url.'";</script>';
    $errorMsg = "Votre fiche a bien été publiée.";
    exit;
}
?>