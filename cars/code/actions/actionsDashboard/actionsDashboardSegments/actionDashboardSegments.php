<?php
if (session_id() == '') {
    session_start();
}
require('../actions/database.php');

// Gestion des requêtes AJAX de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST" && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = htmlspecialchars($data['id']);
    $column = htmlspecialchars($data['column']);
    $value = htmlspecialchars($data['value']);

    // Validation de la colonne pour prévenir les injections SQL
    $validColumns = ['nom'];
    if (!in_array($column, $validColumns)) {
        echo json_encode(['success' => false, 'message' => 'Colonne invalide']);
        exit;
    }

    // Mise à jour de la requête avec la colonne validée
    try {
        $sql = "UPDATE SEGMENT SET $column = :value WHERE id = :id";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Échec de la mise à jour']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur de base de données : ' . $e->getMessage()]);
    }
    exit;
}

// Gestion de l'ajout d'un nouveau segment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));

        if (!empty($nom)) {
            try {
                $sql = "INSERT INTO SEGMENT (NOM_SEGMENT) VALUES (:nom)";
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

// Gestion de la suppression d'un segment
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    try {
        $deleteSegment = $bdd->prepare('DELETE FROM SEGMENT WHERE id = ?');
        $deleteSegment->execute(array($deleteId));
        $url = htmlspecialchars('pageDashboardSegments.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Votre fiche a bien été supprimée.";
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
