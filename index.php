<?php declare(strict_types=1);

use Router\Router;

require_once __DIR__ . "/router/Router.php";

$router = new Router();
$router->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);