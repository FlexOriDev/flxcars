<?php

namespace mvc\app\Controllers;

use mvc\app\Models\Manager\ConstructeurManager;
use mvc\app\Views\View;

class AccueilController
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

        $this->_view = new View('Accueil');
        $this->_view->generate(array('constructeurs' => $constructeurs)); // Corrected method call
    }
}
