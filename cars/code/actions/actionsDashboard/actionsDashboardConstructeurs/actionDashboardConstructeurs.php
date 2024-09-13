<?php
if (session_id() == '') {
    session_start();
}

require('../actions/Database.php');

// Handling AJAX update requests
if ($_SERVER["REQUEST_METHOD"] == "POST" && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = htmlspecialchars($data['id']);
    $column = htmlspecialchars($data['column']);
    $value = htmlspecialchars($data['value']);

    // Validation de la colonne pour prévenir les injections SQL
    $validColumns = ['NOM_CONSTRUCTEUR', 'ID_PAYS', 'ID_GROUPE'];
    if (!in_array($column, $validColumns)) {
        echo json_encode(['success' => false, 'message' => 'Colonne invalide']);
        exit;
    }
    // Mise à jour de la requête avec la colonne validée
    try {
        $sql = "UPDATE CONSTRUCTEUR SET $column = :value WHERE ID = :id";
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

// Handling form submission for adding new constructor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate_dashboard_constructeur'])) {
    if (isset($_POST["nom"], $_POST["pays"], $_POST["groupe"])) {
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $pays = htmlspecialchars(trim($_POST["pays"]));
        $groupe = htmlspecialchars(trim($_POST["groupe"]));

        if (!empty($nom) && !empty($pays) && !empty($groupe)) {
            try {
                $sql = "INSERT INTO CONSTRUCTEUR (NOM_CONSTRUCTEUR, ID_PAYS, ID_GROUPE) VALUES (:nom, :pays, :groupe)";
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

// Handling deletion of a constructor
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    try {
        $deleteConstructeur = $bdd->prepare('DELETE FROM CONSTRUCTEUR WHERE ID = ?');
        $deleteConstructeur->execute(array($deleteId));
        $url = htmlspecialchars('pageDashboardConstructeurs.php');
        $errorMsg = "Votre fiche a bien été supprimée.";
        echo '<script>window.location = "'.$url.'";</script>';
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
