<?php declare(strict_types = 1);

use Service\CarsService;

require_once __DIR__ . "/../service/CarsService.php";

class CarsController
{
    private CarsService $catalogService;
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
        $this->catalogService = new CarsService();
    }

    public function showUpdatePage()
    {
        $id = $_GET['id'];
        return $this->catalogService->showUpdatePage($id);
    }

    public function showCreatePage()
    {
        return $this->catalogService->showCreatePage();
    }

    public function deleteCar()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = intval($data['id'] ?? '');
        $this->catalogService->deleteCar($id);
    }
}