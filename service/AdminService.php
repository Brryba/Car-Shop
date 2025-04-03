<?php

namespace Service;

class AdminService
{
    public function view(string $path): string
    {
        return implode("   ", scandir($_SERVER["DOCUMENT_ROOT"] . "/" . $path));
    }
}