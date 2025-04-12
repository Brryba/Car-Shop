<?php

namespace Exception;

class FileNotAllowedException extends \Exception
{
    protected $message = 'А куда это мы полезли? Давай-ка вернись назад в свою папочку';
    protected $code = 403;
}