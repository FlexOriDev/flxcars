<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

// Handling form submission for adding a new group
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));

        if (!empty($nom)) {
            try {
                // Using the new table and column names
                $sql = "INSERT INTO GROUPE (NOM_GROUPE) VALUES (:nom)";
                $stmt = $bdd->prepare($sql);
                $stmt->bindParam(':nom', $nom);

                if ($stmt->execute()) {
                    $url = htmlspecialchars('pageDashboardGroupes.php');
                    echo '<script>window.location = "'.$url.'";</script>';
                    $errorMsg = "Votre groupe a bien été ajouté.";
                    exit;
                } else {
                    $errorMsg = "Erreur lors de l'ajout du groupe.";
                }
            } catch (PDOException $e) {
                $errorMsg = "Erreur de base de données : " . $e->getMessage();
            }
        } else {
            $errorMsg = "Veuillez remplir tous les champs.";
        }
    } else {
        $errorMsg = "Tous les champs sont requis.";
    }
}

// Handling deletion of a group
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];

    try {
        // Using the new table and column names
        $deleteGroup = $bdd->prepare('DELETE FROM GROUPE WHERE ID = ?');
        $deleteGroup->execute(array($deleteId));
        $url = htmlspecialchars('pageDashboardGroupes.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Votre groupe a bien été supprimé.";
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
