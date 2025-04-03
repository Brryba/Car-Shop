<?php declare(strict_types = 1);

use Service\AdminService;

require_once __DIR__ . "/../service/AdminService.php";

class AdminController implements BaseController
{
    private AdminService $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
}

    function execute(): string
    {
        $path = $_GET["path"] ?? "";
        return $this->adminService->view($path);
    }
}