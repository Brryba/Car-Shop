<?php declare(strict_types = 1);

use Exception\FileExistsException;
use Service\AdminService;
use Exception\FileNotFoundException;
use Exception\FileNotAllowedException;
use Exception\IncorrectExtensionException;

require_once __DIR__ . "/../service/AdminService.php";
require_once __DIR__ . "/../exception/FileNotFoundException.php";
require_once __DIR__ . "/../exception/FileNotAllowedException.php";
require_once __DIR__ . "/../exception/IncorrectExtensionException.php";
require_once __DIR__ . "/../exception/FileExistsException.php";

class AdminController
{
    private AdminService $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
}

    function showAdminFileManager(): string
    {
        $path = $_GET["path"] ?? "";
        try {
            return $this->adminService->getPageView($path);
        } catch (FileNotFoundException|FileNotAllowedException|IncorrectExtensionException $e){
            http_response_code($e->getCode());
            return $e->getMessage();
        }
    }

    /**
     * @throws FileNotFoundException
     */
    function updateFile(): void
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $path = $data['path'] ?? "";
        $newText = $data['newText'];
        $this->adminService->updateFile($path, $newText);
    }

    /**
     * @throws FileExistsException
     * @throws FileNotFoundException
     * @throws IncorrectExtensionException
     * @throws FileNotAllowedException
     */
    function createFile(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $file = $data['file'] ?? '';
        $path = $data['currPath'] ?? '';
        $this->adminService->createFile($file, $path);
    }

    /**
     * @throws FileNotFoundException
     * @throws FileNotAllowedException|
     * @throws Exception\FileExistsException
     */
    function createDirectory(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $directory = $data['directory'] ?? '';
        $path = $data['currPath'] ?? '';
        $this->adminService->createDirectory($directory, $path);
    }

    /**
     * @throws FileNotFoundException
     */
    function deleteFile(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $path = $data['path'] ?? '';
        $this->adminService->deleteFile($path);
    }
}