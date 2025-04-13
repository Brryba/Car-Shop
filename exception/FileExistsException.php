<?php

namespace Exception;

class FileExistsException extends \Exception
{
    protected $message = "File already exists";
    protected $code = 409;
}