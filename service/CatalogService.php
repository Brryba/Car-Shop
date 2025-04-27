<?php declare(strict_types=1);

namespace Service;

require_once __DIR__ . "/../engine/TemplateEngine.php";

class CatalogService
{
    private TemplateEngine $templateEngine;
    private array $cars = [
        [
            'name' => 'Volvo S90',
            'description' => '2021 год, Автомат, 465 л.с. / 2,0 л, Подключаемый полный привод, 135000 км',
            'price' => '35,000 $',
            'imagePath' => '/public/images/car1.png',
            'user' => 'bryba'
        ],
        [
            'name' => 'Chevrolet Malibu',
            'description' => '2021 год, Автомат, 250 л.с. / 2,0 л, Передний привод, 50000 км',
            'price' => '17,000 $',
            'imagePath' => '/public/images/car2.png',
            'user' => 'sergey'
        ],
        [
            'name' => 'Volkswagen Polo',
            'description' => '2007 год, Механика, 80 л.с. / 1,4 л, Передний привод, 460000 км',
            'price' => '4,800 $',
            'imagePath' => '/public/images/car3.png',
            'user' => 'sergey'
        ],
        [
            'name' => 'Xiaomi SU7',
            'description' => '2024 год, Автомат, 673 л.с. / 495 кВ, Полный привод, 5000 км',
            'price' => '41,200 $',
            'imagePath' => '/public/images/car4.png',
            'user' => 'bryba'
        ],
        [
            'name' => 'Honda Civic',
            'description' => '2021 год, Вариатор, 181 л.с. / 1,5 л, Передний привод, 20000 км',
            'price' => '18,300 $',
            'imagePath' => '/public/images/car5.png',
            'user' => 'aleksandr'
        ],
        [
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
        $this->templateEngine->setBoolValue("isOwn", false);
        $template = file_get_contents(__DIR__ . "/../public/templates/catalog.tpl");
        return $this->templateEngine->createTemplate($template);
    }
}