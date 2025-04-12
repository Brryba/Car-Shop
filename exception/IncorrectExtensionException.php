<?php

namespace Exception;

class IncorrectExtensionException extends \Exception
{
    protected $message = 'Error 415. File extension not supported.';
    protected $code = 415;
}