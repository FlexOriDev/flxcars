<?php
namespace mvc\app\Res;
class Error{

    public static function getAutoLoadError101($filePath) {
        return 'ERREUR 101 - AUTOLOAD - Fichier non trouvé : ' . $filePath;
    }

    public static function getAutoLoadError102() {
        return 'ERREUR 102 - CONTROLLER - Fichier non trouvé ';
    }

    public static function getAutoLoadError103($filePath) {
        return 'ERREUR 103 - VIEW - Fichier non trouvé : ' . $filePath;
    }
}

