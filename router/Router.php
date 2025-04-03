<?php declare(strict_types = 1);

namespace Router;

use BaseController;
use CatalogController;

require_once __DIR__ . "/../controller/CatalogController.php";

class Router
{
    private array $GETDict = [
        "/" => CatalogController::class,
    ];

    private function findGetController($path): ?BaseController
    {
        if (isset($this->GETDict[$path])) {
            $controllerClass = $this->GETDict[$path];
            return new $controllerClass();
        }
        else {
            return null;
        }
    }

    public function handle($method, $path)
    {
        $controller = null;
        switch ($method) {
            case "GET":
                $controller = $this->findGetController($path);
            case "POST":
                //
            case "PUT":
                //
            case "DELETE":
                //
        }
        if ($controller != null) {
            echo $controller->execute();
        } else {
            echo "Error 404 Requested page not found!";
        }
    }
}