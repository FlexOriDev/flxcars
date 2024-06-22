<?php

namespace mvc\app;
use mvc\app\Res\Error;
class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try {
            // Chargement automatique des classes
            spl_autoload_register(function ($class) {
                $baseUrl = 'D:\flxcars\flxcars';
                $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
                $filePath = $baseUrl . '/' . $classPath;
                if (file_exists($filePath)) {
                    require_once($filePath);
                } else {
                    throw new \Exception(Error::getAutoLoadError101($filePath));
                }
            });

            $url = '';

            // Le contrôleur est inclus selon l'action de l'utilisateur
            if (isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "mvc\\app\\Controllers\\" . $controller . "Controller";
                $controllerFile = __DIR__ . "/Controllers/" . $controller . "Controller.php";

                if (file_exists($controllerFile)) {
                    require_once(__DIR__ . '/Controllers/HeaderController.php');
                    require_once($controllerFile);
                    require_once(__DIR__ . '/Controllers/FooterController.php');
                    $this->_ctrl = new \mvc\app\Controllers\HeaderController($url);
                    $this->_ctrl = new $controllerClass($url);
                    $this->_ctrl = new \mvc\app\Controllers\FooterController($url);
                } else {
                    throw new \Exception(Error::getAutoLoadError102());
                }
            } else {
                require_once(__DIR__ . '/Controllers/HeaderController.php');
                require_once(__DIR__ . '/Controllers/AccueilController.php');
                require_once(__DIR__ . '/Controllers/FooterController.php');
                $this->_ctrl = new \mvc\app\Controllers\HeaderController($url);
                $this->_ctrl = new \mvc\app\Controllers\AccueilController($url);
                $this->_ctrl = new \mvc\app\Controllers\FooterController($url);
            }
        }
            // Gestion des erreurs
        catch (\Exception $e) {
            $errorMsg = $e->getMessage();

            require_once(__DIR__ . '/Controllers/HeaderController.php');
            require_once(__DIR__ . '/Controllers/ErrorController.php');
            require_once(__DIR__ . '/Controllers/FooterController.php');
            $this->_ctrl = new \mvc\app\Controllers\HeaderController($url);
            $this->_ctrl = new \mvc\app\Controllers\ErrorController($url, $errorMsg);
            $this->_ctrl = new \mvc\app\Controllers\FooterController($url);
        }
    }
}
