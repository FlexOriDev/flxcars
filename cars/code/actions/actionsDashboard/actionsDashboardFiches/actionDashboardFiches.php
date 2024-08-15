<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];

    // Préparez la requête SQL en utilisant le nouveau nom de la table
    $deleteFiche = $bdd->prepare('DELETE FROM FICHE WHERE ID_FICHE = ?');
    $deleteFiche->execute(array($deleteId));

    // Redirigez vers la page de tableau de bord
    $url = htmlspecialchars('pageDashboardFiches.php');
    echo '<script>window.location = "'.$url.'";</script>';

    // Message de confirmation de la suppression
    $errorMsg = "Votre fiche a bien été supprimée.";
    exit;
}
?>
