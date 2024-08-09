<?php
if (session_id() == '') {
    session_start();
}
require('../actions/database.php');

// Handling AJAX update requests
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
        $sql = "UPDATE types SET $column = :value WHERE id = :id";
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

// Existing code for form submission handling (adding new country)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));

        if (!empty($nom)) {
            try {
                $sql = "INSERT INTO types (nom) VALUES (:nom)";
                $stmt = $bdd->prepare($sql);
                $stmt->bindParam(':nom', $nom);

                if ($stmt->execute()) {
                    $url = htmlspecialchars('pageDashboardTypes.php');
                    echo '<script>window.location = "'.$url.'";</script>';
                    $errorMsg = "Votre fiche a bien été publiée.";
                    exit;
                } else {
                    $errorMsg = "Erreur lors de l'ajout du type.";
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

// Existing code for handling deletion
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    try {
        $deleteConstructeur = $bdd->prepare('DELETE FROM types WHERE id = ?');
        $deleteConstructeur->execute(array($deleteId));
        $url = htmlspecialchars('pageDashboardTypes.php');
        echo '<script>window.location = "'.$url.'";</script>';
        $errorMsg = "Votre fiche a bien été supprimée.";
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
