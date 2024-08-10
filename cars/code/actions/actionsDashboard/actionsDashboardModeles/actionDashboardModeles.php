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

    // Validation of the column to prevent SQL injection
    $validColumns = ['nom'];
    if (!in_array($column, $validColumns)) {
        echo json_encode(['success' => false, 'message' => 'Invalid column']);
        exit;
    }

    // Update query with validated column
    try {
        $sql = "UPDATE modeles SET $column = :value WHERE id = :id";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
    exit;
}

// Handling form submission (adding a new model)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset($_POST["nom"], $_POST["constructeur"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $constructeur = htmlspecialchars(trim($_POST["constructeur"]));

        if (!empty($nom) && !empty($constructeur)) {
            try {
                $sql = "INSERT INTO modeles (nom, id_constructeur) VALUES (:nom, :constructeur)";
                $stmt = $bdd->prepare($sql);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':constructeur', $constructeur);

                if ($stmt->execute()) {
                    $url = htmlspecialchars('pageDashboardModeles.php');
                    echo '<script>window.location = "'.$url.'";</script>';
                    exit;
                } else {
                    $errorMsg = "Error adding the model.";
                }
            } catch (PDOException $e) {
                $errorMsg = "Database error: " . $e->getMessage();
            }
        } else {
            $errorMsg = "Please fill out all fields.";
        }
    } else {
        $errorMsg = "All fields are required.";
    }
}

// Handling model deletion
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    try {
        $deleteModele = $bdd->prepare('DELETE FROM modeles WHERE id = ?');
        $deleteModele->execute(array($deleteId));
        $url = htmlspecialchars('pageDashboardModeles.php');
        echo '<script>window.location = "'.$url.'";</script>';
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Database error: " . $e->getMessage();
    }
}
?>
