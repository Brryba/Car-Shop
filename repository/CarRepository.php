<?php declare(strict_types = 1);

namespace repository;

use Model\Car;

require_once __DIR__ . "/../model/Car.php";

class carRepository
{
    function add(Car $car)
    {

    }

    function getAll(): array
    {
        return [];
    }

    function update(Car $car)
    {

    }

    function delete(int $id) {}
}