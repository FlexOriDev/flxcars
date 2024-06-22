<?php

namespace mvc\app\Controllers;

use mvc\app\Models\Manager\ConstructeurManager;

class HeaderController
{
    private $_constructeurManager;
    private $_view;

    public function __construct($url)
    {
        if (!isset($url)) {
            throw new \Exception('Page introuvable : ' . $url);
        } else {
            $this->loadConstructeurs();
        }
    }

    private function loadConstructeurs()
    {
        $this->_constructeurManager = new ConstructeurManager();
        $constructeurs = $this->_constructeurManager->getConstructeurs();

        require_once(__DIR__ . '/../Views/Static/HeaderView.php');
    }
}
