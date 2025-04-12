<?php declare(strict_types = 1);

use Service\AdminService;
use Exception\FileNotFoundException;
use Exception\FileNotAllowedException;
use Exception\IncorrectExtensionException;

require_once __DIR__ . "/../service/AdminService.php";
require_once __DIR__ . "/../exception/FileNotFoundException.php";
require_once __DIR__ . "/../exception/FileNotAllowedException.php";
require_once __DIR__ . "/../exception/IncorrectExtensionException.php";

class AdminController implements BaseController
{
    private AdminService $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
}

    function execute(): string
    {
        $path = $_GET["path"] ?? "";
        try {
            return $this->adminService->getPageView($path);
        } catch (FileNotFoundException|FileNotAllowedException|IncorrectExtensionException $e){
            http_response_code($e->getCode());
            return $e->getMessage();
        }
    }
}