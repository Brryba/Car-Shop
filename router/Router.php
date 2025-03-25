<?php

namespace router;

class Router
{
    private $GETDict = [
        "/" => "view/html/index.html"
    ];

    private function handleGET($path)
    {
        if (isset($this->GETDict[$path])) {
            $newPage = $this->GETDict[$path];
            require $newPage;
        }
        else {
            echo "Error 404. Page not found";
        }
    }

    public function handle($method, $path)
    {
        switch ($method) {
            case "GET":
                $this->handleGET($path);
            case "POST":
                //
            case "PUT":
                //
            case "DELETE":
                //
        }
    }
}