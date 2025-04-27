<?php declare(strict_types = 1);

use Service\CatalogService;

require_once __DIR__ . "/../service/CatalogService.php";

class CatalogController
{
    private CatalogService $catalogService;
    public function showCatalogPage()
    {
        return $this->catalogService->showAll();
    }

    public function showUserCatalogPage()
    {
        $userName = $_GET['name'];
        return $this->catalogService->showAllUserCars($userName);
    }

    public function __construct()
    {
        $this->catalogService = new CatalogService();
    }
}