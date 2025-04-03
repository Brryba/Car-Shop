<?php declare(strict_types = 1);

use Service\CatalogService;

require_once __DIR__ . "/BaseController.php";
require_once __DIR__ . "/../service/CatalogService.php";

class CatalogController implements BaseController
{
    private CatalogService $catalogService;
    public function execute()
    {
        return $this->catalogService->createCatalogPage();
    }

    public function __construct()
    {
        $this->catalogService = new CatalogService();
    }
}