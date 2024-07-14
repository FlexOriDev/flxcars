<?php
define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS'])?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once(__DIR__ . '/../app/Router.php');
require_once(__DIR__ . '/../app/Res/Error.php');

use mvc\app\Router;

$error = new Error();

$router = new Router();
$router->routeReq();
?>