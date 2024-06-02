<?php

namespace mvc\app;

use mvc\app\Controllers\VoituresController;

class Router
{
    private $routes = [];

    public function get($path, $controllerAction)
    {
        $this->routes['GET'][$path] = $controllerAction;
    }

    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            $controllerAction = explode('@', $this->routes[$method][$uri]);
            $this->callAction($controllerAction[0], $controllerAction[1]);
        } else {
            $this->abort(404);
        }
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            $this->abort(404);
        }

        return $controller->$action();
    }

    protected function abort($code)
    {
        http_response_code($code);
        die('Page not found');
    }
}

$router = new Router;

// Définir les routes ici
$router->get('voitures', 'VoituresController@index');

return $router;
