<?php
if (session_id() == '') {
    session_start();
}
require('../actions/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"], $_POST["constructeur"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $constructeur = htmlspecialchars(trim($_POST["constructeur"]));

        if (!empty($nom)) {
            $sql = "INSERT INTO modeles (nom, id_constructeur) VALUES (:nom, :constructeur)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':constructeur', $constructeur);

            if ($stmt->execute()) {
                $url = htmlspecialchars('pageDashboardModeles.php');
                echo '<script>window.location = "'.$url.'";</script>';
                $errorMsg = "Votre fiche a bien été publiée.";
                exit;
            } else {
                $errorMsg = "Erreur lors de l'ajout du modele.";
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
    $deleteModele = $bdd->prepare('DELETE FROM modeles WHERE id = ?');
    $deleteModele->execute(array($deleteId));
    $url = htmlspecialchars('pageDashboardModeles.php');
    echo '<script>window.location = "'.$url.'";</script>';
    $errorMsg = "Votre fiche a bien été publiée.";
    exit;
}
?>