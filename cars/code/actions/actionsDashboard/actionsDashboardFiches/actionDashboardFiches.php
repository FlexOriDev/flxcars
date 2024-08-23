<?php
if (session_id() == '') {
    session_start();
}
require('../actions/Database.php');

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];

    // Fonction pour supprimer un fichier
    function deleteFile($filePath) {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Fonction pour supprimer un dossier et son contenu
    function deleteDirectory($dirPath) {
        if (is_dir($dirPath)) {
            $files = array_diff(scandir($dirPath), ['.', '..']);
            foreach ($files as $file) {
                $filePath = $dirPath . '/' . $file;
                is_dir($filePath) ? deleteDirectory($filePath) : deleteFile($filePath);
            }
            rmdir($dirPath);
        }
    }

    // Préparez la requête SQL pour récupérer le nom du modèle
    $getNomModele = $bdd->prepare('SELECT NOM_MODELE FROM FICHE
                                   JOIN MODELE ON FICHE.ID_MODELE = MODELE.ID
                                   WHERE FICHE.ID = ?');
    $getNomModele->execute([$deleteId]);
    $modeleArray = $getNomModele->fetch();
    $modele = $modeleArray['NOM_MODELE'];

    // Construire le chemin du dossier de la fiche
    $destinationFolder = "../../library/voitures/" . $modele . "/" . $deleteId . "/";

    // Supprimer le dossier de la fiche
    if (is_dir($destinationFolder)) {
        deleteDirectory($destinationFolder);
    }

    // Supprimer les images et les versions associées
    $deleteImages = $bdd->prepare('DELETE FROM IMAGE WHERE ID_FICHE = ?');
    $deleteImages->execute([$deleteId]);

    $deleteVersions = $bdd->prepare('DELETE FROM VERSION WHERE ID_FICHE = ?');
    $deleteVersions->execute([$deleteId]);

    // Supprimer la fiche
    $deleteFiche = $bdd->prepare('DELETE FROM FICHE WHERE ID = ?');
    $deleteFiche->execute([$deleteId]);

    // Vérifier si le dossier modèle est vide après la suppression
    $modeleFolder = "../../library/voitures/" . $modele . "/";
    if (is_dir($modeleFolder)) {
        $remainingFiles = array_diff(scandir($modeleFolder), ['.', '..']);
        if (empty($remainingFiles)) {
            // Supprimer le dossier du modèle s'il est vide
            rmdir($modeleFolder);
        }
    }

    // Rediriger vers la page de tableau de bord
    $url = htmlspecialchars('pageDashboardFiches.php');
    echo '<script>window.location = "'.$url.'";</script>';
    exit;
}
?>
