<?php

namespace Exception;

class FileNotFoundException extends \Exception
{
    protected $message = 'Error 404. File not found';
    protected $code = 404;
}