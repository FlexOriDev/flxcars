<?php

namespace mvc\app\Controllers;

class ProfilController
{
    private $_view;

    public function __construct($url)
    {
        if (!isset($url)) {
            throw new \Exception('Page introuvable : ' . $url);
        } else {
            require_once(__DIR__ . '/../Views/ProfilView.php');
        }
    }

}
