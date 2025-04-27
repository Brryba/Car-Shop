<?php declare(strict_types=1);

namespace Service;

require_once __DIR__ . "/../engine/TemplateEngine.php";

class CarsService
{
    private TemplateEngine $templateEngine;
    private array $cars = [
        [
            'id' => 1,
            'name' => 'Volvo S90',
            'description' => '2021 год, Автомат, 465 л.с. / 2,0 л, Подключаемый полный привод, 135000 км',
            'price' => '35,000 $',
            'imagePath' => '/public/images/car1.png',
            'user' => 'bryba'
        ],
        [
            'id' => 2,
            'name' => 'Chevrolet Malibu',
            'description' => '2021 год, Автомат, 250 л.с. / 2,0 л, Передний привод, 50000 км',
            'price' => '17,000 $',
            'imagePath' => '/public/images/car2.png',
            'user' => 'sergey'
        ],
        [
            'id' => 3,
            'name' => 'Volkswagen Polo',
            'description' => '2007 год, Механика, 80 л.с. / 1,4 л, Передний привод, 460000 км',
            'price' => '4,800 $',
            'imagePath' => '/public/images/car3.png',
            'user' => 'sergey'
        ],
        [
            'id' => 4,
            'name' => 'Xiaomi SU7',
            'description' => '2024 год, Автомат, 673 л.с. / 495 кВ, Полный привод, 5000 км',
            'price' => '41,200 $',
            'imagePath' => '/public/images/car4.png',
            'user' => 'bryba'
        ],
        [
            'id' => 5,
            'name' => 'Honda Civic',
            'description' => '2021 год, Вариатор, 181 л.с. / 1,5 л, Передний привод, 20000 км',
            'price' => '18,300 $',
            'imagePath' => '/public/images/car5.png',
            'user' => 'aleksandr'
        ],
        [
            'id' => 6,
            'name' => 'Volvo XC60',
            'description' => '2022 год, Автомат, 250 л.с. / 2,0 л, Передний привод, 37000 км',
            'price' => '42,500 $',
            'imagePath' => '/public/images/car6.png',
            'user' => 'volodya'
        ]
    ];

    function __construct()
    {
        $this->templateEngine = new TemplateEngine();
    }

    public function showAll(): string
    {
        $this->templateEngine->refresh();
        $this->templateEngine->setArrayValue("cars", $this->cars);
        $this->templateEngine->setBoolValue("isOwn", false);
        $template = file_get_contents(__DIR__ . "/../public/templates/catalog.tpl");
        return $this->templateEngine->createTemplate($template);
    }

    private function filterCarsByName(string $user): array
    {
        $filteredCars = [];
        foreach ($this->cars as $car) {
            if (strtolower($car['user']) === $user) {
                $filteredCars[] = $car;
            }
        }

        return $filteredCars;
    }

    public function showAllUserCars($userName)
    {
        $this->templateEngine->refresh();
        $this->templateEngine->setArrayValue("cars", $this->filterCarsByName($userName));
        $this->templateEngine->setBoolValue("isOwn", true);
        $template = file_get_contents(__DIR__ . "/../public/templates/catalog.tpl");
        return $this->templateEngine->createTemplate($template);
    }

    public function showUpdatePage($id): string
    {
        $template = file_get_contents(__DIR__ . "/../public/templates/car.tpl");
        $this->templateEngine->refresh();

        foreach ($this->cars as $car) {
            if ($car['id'] == $id) {
                $updatingCar = $car;
                break;
            }
        }

        $this->templateEngine->setStringValue("id", strval($updatingCar['id']));
        $this->templateEngine->setStringValue("name", $updatingCar['name']);
        $this->templateEngine->setStringValue("description", $updatingCar['description']);
        $this->templateEngine->setStringValue("price", $updatingCar['price']);
        $this->templateEngine->setStringValue("imagePath", $updatingCar['imagePath']);
        $this->templateEngine->setStringValue("user", $updatingCar['user']);
        $this->templateEngine->setStringValue("image", $updatingCar['imagePath']);

        $this->templateEngine->setBoolValue("isNew", false);
        return $this->templateEngine->createTemplate($template);
    }

    public function showCreatePage(): string
    {
        $template = file_get_contents(__DIR__ . "/../public/templates/car.tpl");
        $this->templateEngine->refresh();
        $this->templateEngine->setBoolValue("isNew", true);
        return $this->templateEngine->createTemplate($template);
    }

    public function createCar(array $car): void
    {
        $this->cars[] = $car;
    }

    public function updateCar(array $car): void
    {

    }

    public function deleteCar(int $id): void
    {
        foreach ($this->cars as $key => $car) {
            if ($car['id'] === $id) {
                unset($this->cars[$key]);
                break;
            }
        }
    }
}