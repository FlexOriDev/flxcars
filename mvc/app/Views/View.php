<?php
namespace mvc\app\Views;

use mvc\app\Res\Error;

class View{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = '/flxcars/flxcars/mvc/app/views/'.$action.'View.php';
    }

    // Genere et affiche la vue
    public function generate($data)
    {
        // Partie spécifique de la vue
        $content = $this->generateFile($this->_file, $data);

        // Template
        $view = $this->generateFile('/flxcars/flxcars/mvc/app/views/Template.php', array('t' => $this-> _t, 'content' => $content));

        echo $view;
    }

    // Genere un fichier vue et renvoie le resultat produit
    private function generateFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);

            ob_start();

            // Inclut le fichier vue
            require $file;

            return ob_get_clean();
        }else{
            throw new \Exception(Error::getAutoLoadError103($file));
        }
    }

}