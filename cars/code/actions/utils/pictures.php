<?php
function resizeAndFillImage($sourcePath, $destinationPath, $newWidth, $newHeight) {
    // Ouvrir l'image source
    $sourceImage = imagecreatefromjpeg($sourcePath);

    // Récupérer les dimensions de l'image d'origine
    $originalWidth = imagesx($sourceImage);
    $originalHeight = imagesy($sourceImage);

    // Créer une image vide avec la taille spécifiée et remplir avec du noir
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    $black = imagecolorallocate($newImage, 0, 0, 0);
    imagefill($newImage, 0, 0, $black);

    // Calculer le ratio de redimensionnement pour remplir l'image de destination
    $widthRatio = $newWidth / $originalWidth;
    $heightRatio = $newHeight / $originalHeight;

    // Choisir le ratio de redimensionnement maximal pour remplir l'image de destination
    $resizeRatio = max($widthRatio, $heightRatio);

    // Calculer les nouvelles dimensions de l'image
    $resizedWidth = $originalWidth * $resizeRatio;
    $resizedHeight = $originalHeight * $resizeRatio;

    // Calculer les coordonnées pour placer l'image d'origine au centre de l'image vide
    $x = ($newWidth - $resizedWidth) / 2;
    $y = ($newHeight - $resizedHeight) / 2;

    // Redimensionner et copier l'image source dans l'image vide
    imagecopyresampled($newImage, $sourceImage, $x, $y, 0, 0, $resizedWidth, $resizedHeight, $originalWidth, $originalHeight);

    // Sauvegarder l'image redimensionnée dans le dossier de destination
    imagejpeg($newImage, $destinationPath);

    // Libérer la mémoire
    imagedestroy($sourceImage);
    imagedestroy($newImage);
}
?>