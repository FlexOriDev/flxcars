<?php

require_once(__DIR__ . '/../app/Router.php');
require_once(__DIR__ . '/../app/Res/Error.php');

use mvc\app\Router;

$error = new Error();

$router = new Router();
$router->routeReq();
?>