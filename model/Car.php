<?php declare(strict_types = 1);

namespace Model;

class Car
{
    private int $id;
    private string $name;
    private array $features;
    private string $photoPath;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getFeatures(): array
    {
        return $this->features;
    }

    public function setFeatures(array $features)
    {
        $this->features = $features;
    }

    public function getPhotoPath(): string
    {
        return $this->photoPath;
    }

    public function setPhotoPath(string $photoPath)
    {
        $this->photoPath = $photoPath;
    }

    function __construct(int $id, string $name, array $features, string $photoPath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->features = $features;
        $this->photoPath = $photoPath;
    }
}