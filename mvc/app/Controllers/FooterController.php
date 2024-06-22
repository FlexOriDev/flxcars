<?php

namespace mvc\app\Controllers;

class FooterController
{
    private $_view;

    public function __construct($url)
    {
        if (!isset($url)) {
            throw new \Exception('Page introuvable : ' . $url);
        } else {
            require_once(__DIR__ . '/../Views/Static/FooterView.php');
        }
    }

}
