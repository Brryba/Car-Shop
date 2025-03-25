<?php

abstract class BaseController
{
    private $service;
    abstract function showAll();
    abstract function add($id);
    abstract function edit($id);
    abstract function delete($id);
    function __construct($service)
    {
        $this->service = $service;
    }
}