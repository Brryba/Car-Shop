<?php declare(strict_types = 1);

namespace Service;

use Service\TemplateEngine;

require_once __DIR__ . "/TemplateEngine.php";

class AdminService
{
    private TemplateEngine $templateEngine;

    function __construct()
    {
        $this->templateEngine = new TemplateEngine();
    }

    public function view(string $path): string
    {
        implode("   ", scandir($_SERVER["DOCUMENT_ROOT"] . "/public" . $path));
        $this->templateEngine->setBoolValue("boolean", false);
        $this->templateEngine->setStringValue("var", "works");
        $this->templateEngine->setArrayValue("arr", [["var1" => "ya", "var2" => "aboba"],
            ["var1" => "ya2", "var2" => "aboba2"]]);
        $template = file_get_contents(__DIR__ . "/../public/templates/car/example.tpl");
        return $this->templateEngine->createTemplate($template);
        //return file_get_contents(__DIR__ . "/../public/templates/admin/admin-page.tpl");
    }
}