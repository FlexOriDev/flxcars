<?php
if (session_id() == '') {
    session_start();
}
require('../actions/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));

        if (!empty($nom)) {
            $sql = "INSERT INTO types (nom) VALUES (:nom)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nom', $nom);

            if ($stmt->execute()) {
                $url = htmlspecialchars('pageDashboardModeles.php');
                echo '<script>window.location = "'.$url.'";</script>';
                $errorMsg = "Votre fiche a bien été publiée.";
                exit;
            } else {
                $errorMsg = "Erreur lors de l'ajout du constructeur.";
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
    $deleteConstructeur = $bdd->prepare('DELETE FROM types WHERE id = ?');
    $deleteConstructeur->execute(array($deleteId));
    $url = htmlspecialchars('pageDashboardModeles.php');
    echo '<script>window.location = "'.$url.'";</script>';
    $errorMsg = "Votre fiche a bien été publiée.";
    exit;
}
?>