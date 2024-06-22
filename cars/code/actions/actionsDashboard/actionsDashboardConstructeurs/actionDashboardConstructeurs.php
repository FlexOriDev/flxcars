<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"], $_POST["pays"], $_POST["groupe"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $pays = htmlspecialchars(trim($_POST["pays"]));
        $groupe = htmlspecialchars(trim($_POST["groupe"]));

        if (!empty($nom) && !empty($pays) && !empty($groupe)) {
            $sql = "INSERT INTO constructeurs (nom, id_pays, id_groupe) VALUES (:nom, :pays, :groupe)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':pays', $pays);
            $stmt->bindParam(':groupe', $groupe);

            if ($stmt->execute()) {
                $url = htmlspecialchars('pageDashboardConstructeurs.php');
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
    $deleteConstructeur = $bdd->prepare('DELETE FROM constructeurs WHERE id = ?');
    $deleteConstructeur->execute(array($deleteId));
    $url = htmlspecialchars('pageDashboardConstructeurs.php');
    echo '<script>window.location = "'.$url.'";</script>';
    $errorMsg = "Votre fiche a bien été publiée.";
    exit;
}
?>