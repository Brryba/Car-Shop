<?php declare(strict_types=1);

namespace Router;

use CarsController;
use AdminController;
use Exception\FileExistsException;

require_once __DIR__ . "/../controller/CarsController.php";
require_once __DIR__ . "/../controller/AdminController.php";

class Router
{
    private array $routes = [
        "GET" => [
            "/" => ["controller" => CarsController::class, "function" => "showCatalogPage"],
            "/admin" => ["controller" => AdminController::class, "function" => "showAdminFileManager"],
            "/user" => ["controller" => CarsController::class, "function" => "showUserCatalogPage"],
            "/new" => ["controller" => CarsController::class, "function" => "showCreatePage"],
            "/update" => ["controller" => CarsController::class, "function" => "showUpdatePage"],
        ], "POST" => [
            "/admin/api/createFile" => ["controller" => AdminController::class, "function" => "createFile"],
            "/admin/api/createDir" => ["controller" => AdminController::class, "function" => "createDirectory"],
        ], "PUT" => [
            "/admin/api/updateFile" => ["controller" => AdminController::class, "function" => "updateFile"],
        ], "DELETE" => [
            "/admin/api/deleteFile" => ["controller" => AdminController::class, "function" => "deleteFile"],
            "/api/car/delete" => ["controller" => CarsController::class, "function" => "deleteCar"],
        ]
    ];

    public function handle(string $method, string $path): void
    {
        $simplePath = strtok($path, "?") ?: "/";

        if (!isset($this->routes[$method][$simplePath])) {
            $this->showError();
            return;
        }
        $action = $this->routes[$method][$simplePath];

        if ($action === null) {
            $this->showError();
            return;
        }

        $controller = new $action["controller"]();
        $func = $action["function"];
        try {
            echo $controller->$func();
        } catch (\Exception|FileExistsException $e) {
            http_response_code($e->getCode());
            echo $e->getMessage();
        }
    }

    private function showError(): void
    {
        http_response_code(404);
        echo "Error 404: Requested page not found";
    }
}