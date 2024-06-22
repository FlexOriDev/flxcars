<?php

namespace mvc\app\Controllers;

class ErrorController
{
    private $_view;

    public function __construct($url, $errorMsg)
    {
        if (!isset($url)) {
            throw new \Exception('Page introuvable : ' . $url);
        } else {
            require_once(__DIR__ . '/../Views/ErrorView.php');
        }
    }

}
