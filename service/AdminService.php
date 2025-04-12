<?php declare(strict_types=1);

namespace Service;

use Exception;
use Exception\IncorrectExtensionException;
use Exception\FileNotFoundException;
use Exception\FileNotAllowedException;

require_once __DIR__ . "/TemplateEngine.php";

class AdminService
{
    private TemplateEngine $templateEngine;
    private string $basePath;

    function __construct()
    {
        $this->templateEngine = new TemplateEngine();
        $this->basePath = $_SERVER["DOCUMENT_ROOT"] . "/public";
    }

    private function getProjectPath($path): string
    {
        return str_replace($this->basePath, "", $path);
    }

    private function setBackPage($path): void
    {
        $isMain = ($path === $this->basePath);
        $this->templateEngine->setBoolValue("isNotMain", !$isMain);
        if ($isMain) return;
        $this->templateEngine->setStringValue("backPage",
            str_replace("/" . basename($path), "", $this->getProjectPath($path)));
    }

    private function canAccess($path): bool
    {
        $path = realpath($path);
        return str_starts_with($path, $this->basePath);
    }

    private function isCorrectExtension(string $path): bool
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        if (is_dir($path)) return true;
        return $extension === "png" || $extension === "jpg" || $extension === "jpeg"
            || $extension === "css" || $extension === "html" || $extension === "tpl" ||
            $extension === "js" || $extension === " ts";
    }

    /**
     * @throws FileNotFoundException
     * @throws FileNotAllowedException
     * @throws IncorrectExtensionException
     */
    private function getFullPath(string $path): string
    {
        $path = $this->basePath . "/" . $path;
        if (!file_exists($path)) {
            throw new FileNotFoundException();
        }
        $path = realpath($path);
        if (!$this->canAccess($path)) {
            throw new FileNotAllowedException();
        }
        if (!$this->isCorrectExtension($path)) {
            throw new IncorrectExtensionException();
        }
        return $path;
    }

    private function isDirectory($path): bool
    {
        $isDirectory = is_dir($path);
        $this->templateEngine->setBoolValue("isDirectory", $isDirectory);
        return $isDirectory;
    }

    private function setLinksPath(string $path): void
    {
        $path = $this->getProjectPath($path);
        $pathParts = explode("/", $path);
        $pathParts = array_values(array_diff($pathParts, [""]));

        $linksForTemplate = [["href" => "", "name" => "Главная"]];
        $fullPath = "";
        for ($i = 0; $i < count($pathParts); $i++) {
            $fullPath .= "/" . $pathParts[$i];
            $newLink = ["href" => $fullPath, "name" => $pathParts[$i]];
            $linksForTemplate[] = $newLink;
        }
        $this->templateEngine->setArrayValue("links", $linksForTemplate);
    }

    private function setDirectoryFiles($path): void
    {
        $files = scandir($path);
        $filesDataForTemplate = [];
        foreach ($files as $file) {
            if ($file === ".") continue;
            if ($file === ".." && !$this->canAccess($file)) continue;
            $filesDataForTemplate[] = ["name" => basename($file),
                "icon" => is_file($path . "/" . $file) ? "📄" : "📁",
                "path" => $this->getProjectPath($path) . "/" . $file];
        }
        $this->templateEngine->setArrayValue("files", $filesDataForTemplate);
    }

    private function setFile($path): void
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $isImage = $extension === "png" || $extension === "jpg" || $extension === "jpeg";
        $this->templateEngine->setBoolValue("isImage", $isImage);
        $this->templateEngine->setBoolValue("isText", !$isImage);
        $this->templateEngine->setStringValue("fileName", basename($path));
        $this->templateEngine->setStringValue("fileType", $extension);
        $this->templateEngine->setStringValue("fileSize", (string)filesize($path));
        if (!$isImage) {
            $this->templateEngine->setStringValue("fileContent",
                file_get_contents($path));
        } else {
            $this->templateEngine->setStringValue("filePath",
                $this->getProjectPath($path) . "/public");
        }
    }

    /**
     * @throws FileNotFoundException
     * @throws IncorrectExtensionException
     * @throws FileNotAllowedException
     */
    public function getPageView(string $path): string
    {
        $path = $this->getFullPath($path);

        $this->templateEngine->refresh();
        $this->setLinksPath($path);
        $this->setBackPage($path);
        if ($this->isDirectory($path)) {
            $this->setDirectoryFiles($path);
        } else {
            $this->setFile($path);
        }
        $template = file_get_contents(__DIR__ . "/../public/templates/admin.tpl");
        return $this->templateEngine->createTemplate($template);
    }
}