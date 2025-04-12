<?php declare(strict_types=1);

namespace Service;

class TemplateEngine
{
    private array $values = [];
    private array $arrayValues = [];
    private const SPACES = "\s*";
    private const VAR = self::SPACES . "{{" . self::SPACES . "(.*?)" . self::SPACES . "}}" . self::SPACES;
    private const CONTENT = self::SPACES . "(.*?)" . self::SPACES;

    function __construct()
    {
    }

    public function setStringValue(string $key, string $value): void
    {
        $this->values[$key] = $value;
    }

    public function setBoolValue(string $key, bool $value): void
    {
        $this->values[$key] = (string)$value;
    }

    public function setArrayValue(string $key, array $value): void
    {
        $this->arrayValues[$key] = $value;
    }

    private function replaceIf($template): string
    {
        return preg_replace_callback(
            "/@if". self::SPACES . '\(' . self::VAR . '\)' . self::CONTENT . "@endif/s",
            function ($matches) {
                $condition = $this->values[$matches[1]];
                $content = $matches[2];
                return $condition === "1" ? $content : "";
            }, $template);
    }

    private function replaceIfElse($template): string
    {
        return preg_replace_callback(
            "/@ifwithelse". self::SPACES . '\(' . self::VAR . '\)' . self::CONTENT .
            "@else" . self::CONTENT . "@endifelse/s",
            function ($matches) {
                $condition = $this->values[$matches[1]];
                $content1 = $matches[2];
                $content2 = $matches[3];
                return $condition === "1" ? $content1 : $content2;
            }, $template);
    }

    private function replaceForEach($template): string
    {
        return preg_replace_callback(
            "/@foreach". self::SPACES . '\(' . self::VAR . "as" . self::VAR . '\)'
            . self::CONTENT . "@endforeach/s",
            function ($matches) {
                $name = $matches[1];
                $arr = $this->arrayValues[$matches[2]];
                $content = $matches[3];
                $output = "";
                foreach ($arr as $item) {
                    $output .= $this->parseForEachBody($content, $item, $name);
                }
                return $output;
            }, $template);
    }

    private function parseForEachBody(string $content, array $item, string $name): string
    {
        return preg_replace_callback("/{{" . self::SPACES . $name . "\." . "(.*?)" .
            self::SPACES . "}}/",
            function ($matches) use ($name, $item) {
                return $item[$matches[1]];
            }, $content);
    }

    private function replaceSingleElement($template): string
    {
        return preg_replace_callback("/" . self::VAR . "/",
            function ($matches) {
                return $this->values[$matches[1]];
            }, $template);
    }

    public function createTemplate(string $template): string
    {
        $template = $this->replaceForEach($template);
        $template = $this->replaceIfElse($template);
        $template = $this->replaceIf($template);
        $template = $this->replaceSingleElement($template);
        return $template;
    }
}