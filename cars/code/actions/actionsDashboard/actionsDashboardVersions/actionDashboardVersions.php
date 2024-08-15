<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])) {
    if (isset(
        $_POST["fiche"],        $_POST["appellation"],      $_POST["carburant"],
        $_POST["construction"], $_POST["moteur"], $_POST["cylindree"],        $_POST["performance"],
        $_POST["couple"],       $_POST["zero_to_hundred"],  $_POST["vmax"],
        $_POST["conso"],        $_POST["carrosserie"],      $_POST["marche"])) {

        $fiche = htmlspecialchars(trim($_POST["fiche"]));
        $appellation = htmlspecialchars(trim($_POST["appellation"]));
        $carburant = htmlspecialchars(trim($_POST["carburant"]));
        $construction = htmlspecialchars(trim($_POST["construction"]));
        $moteur = htmlspecialchars(trim($_POST["moteur"]));
        $cylindree = htmlspecialchars(trim($_POST["cylindree"]));
        $performance = htmlspecialchars(trim($_POST["performance"]));
        $couple = htmlspecialchars(trim($_POST["couple"]));
        $zero_to_hundred = htmlspecialchars(trim($_POST["zero_to_hundred"]));
        $vmax = htmlspecialchars(trim($_POST["vmax"]));
        $conso = htmlspecialchars(trim($_POST["conso"]));
        $carrosserie = htmlspecialchars(trim($_POST["carrosserie"]));
        $marche = htmlspecialchars(trim($_POST["marche"]));

        if (!empty($fiche) && !empty($appellation) && !empty($carburant) && !empty($construction) && !empty($moteur)
            && !empty($cylindree) && !empty($performance) && !empty($couple) && !empty($zero_to_hundred)
            && !empty($vmax) && !empty($conso) && !empty($carrosserie) && !empty($marche)) {

            // Use the correct table and columns
            $sql = "INSERT INTO VERSION (ID_FICHE, APPELLATION, CARBURANT, CONSTRUCTION_ANNEE, NOM_MOTEUR, CYLINDREE, PERFORMANCE, COUPLE, ZERO_A_100, VMAX, CONSOMMATION, CARROSSERIE, MARCHE_CONTINENT) 
                    VALUES (:fiche, :appellation, :carburant, :construction, :moteur, :cylindree, :performance, :couple, :zero_to_hundred, :vmax, :conso, :carrosserie, :marche)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':fiche', $fiche);
            $stmt->bindParam(':appellation', $appellation);
            $stmt->bindParam(':carburant', $carburant);
            $stmt->bindParam(':construction', $construction);
            $stmt->bindParam(':moteur', $moteur);
            $stmt->bindParam(':cylindree', $cylindree);
            $stmt->bindParam(':performance', $performance);
            $stmt->bindParam(':couple', $couple);
            $stmt->bindParam(':zero_to_hundred', $zero_to_hundred);
            $stmt->bindParam(':vmax', $vmax);
            $stmt->bindParam(':conso', $conso);
            $stmt->bindParam(':carrosserie', $carrosserie);
            $stmt->bindParam(':marche', $marche);

            if ($stmt->execute()) {
                $url = htmlspecialchars('pageDashboardVersions.php');
                echo '<script>window.location = "'.$url.'";</script>';
                exit;
            } else {
                $errorMsg = "Erreur lors de l'ajout de la version.";
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
    try {
        $deleteVersion = $bdd->prepare('DELETE FROM VERSION WHERE ID = ?');
        $deleteVersion->execute(array($deleteId));
        $url = htmlspecialchars('pageDashboardVersions.php');
        echo '<script>window.location = "'.$url.'";</script>';
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
