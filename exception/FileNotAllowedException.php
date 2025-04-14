<?php

namespace Exception;

class FileNotAllowedException extends \Exception
{
    protected $message = 'А куда это мы полезли? Давай-ка вернись назад в свою папочку,
     не надо тут по серверу лазить 😡';
    protected $code = 403;
}