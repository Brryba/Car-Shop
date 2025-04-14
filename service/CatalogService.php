<?php declare(strict_types = 1);

namespace Service;

class CatalogService
{
    public function createCatalogPage()
    {
        return file_get_contents(__DIR__ . "/../public/templates/car/catalog.tpl");
    }
}