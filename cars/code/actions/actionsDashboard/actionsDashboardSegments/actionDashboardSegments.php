<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));

        if (!empty($nom)) {
            $sql = "INSERT INTO segments (nom) VALUES (:nom)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nom', $nom);

            if ($stmt->execute()) {
                $url = htmlspecialchars('pageDashboardSegments.php');
                echo '<script>window.location = "'.$url.'";</script>';
                $errorMsg = "Votre fiche a bien été publiée.";
                exit;
            } else {
                $errorMsg = "Erreur lors de l'ajout du segment.";
            }
        } else {
            $errorMsg = "Veuillez remplir tous les champs.";
        }
    } else {
        $errorMsg = "Tous les champs sont requis.";
    }
}

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    $deleteSegment = $bdd->prepare('DELETE FROM segments WHERE id = ?');
    $deleteSegment->execute(array($deleteId));
    $url = htmlspecialchars('pageDashboardSegments.php');
    echo '<script>window.location = "'.$url.'";</script>';
    $errorMsg = "Votre fiche a bien été publiée.";
    exit;
}
?>