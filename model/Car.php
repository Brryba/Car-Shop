<?php

namespace model;

class Car
{
    private $id;
    private $name;
    private $features;
    private $photoPath;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFeatures()
    {
        return $this->features;
    }

    public function setFeatures($features)
    {
        $this->features = $features;
    }

    public function getPhotoPath()
    {
        return $this->photoPath;
    }

    public function setPhotoPath($photoPath)
    {
        $this->photoPath = $photoPath;
    }

    function __construct($id, $name, $features, $photoPath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->features = $features;
        $this->photoPath = $photoPath;
    }
}