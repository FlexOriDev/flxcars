<?php
function deleteDirectoryRecursively($dir) {
    if (!file_exists($dir)) {
        echo "Le répertoire n'existe pas : $dir\n";
        return false;
    }

    if (!is_dir($dir)) {
        echo "Ce n'est pas un répertoire : $dir\n";
        return unlink($dir);
    }

    $files = array_diff(scandir($dir), array('.', '..'));

    foreach ($files as $file) {
        $filePath = $dir . DIRECTORY_SEPARATOR . $file;

        if (is_dir($filePath)) {
            echo "Suppression du sous-répertoire : $filePath\n";
            deleteDirectoryRecursively($filePath);
        } else {
            echo "Suppression du fichier : $filePath\n";
            unlink($filePath);
        }
    }

    echo "Suppression du répertoire : $dir\n";
    return rmdir($dir);
}

