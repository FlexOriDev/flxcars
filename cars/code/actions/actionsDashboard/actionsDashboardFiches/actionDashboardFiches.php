<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    $deleteFiche = $bdd->prepare('DELETE FROM fiches WHERE id = ?');
    $deleteFiche->execute(array($deleteId));
    $url = htmlspecialchars('pageDashboardFiches.php');
    echo '<script>window.location = "'.$url.'";</script>';
    $errorMsg = "Votre fiche a bien été publiée.";
    exit;
}
?>