<?php
declare(strict_types=1);

class Pokemon1 {
    private $name;
    private $element;
    private $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setElement(string $element)
    {
        $this->element = $element;
    }

    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElement(): string
    {
        return $this->element;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function reduceHealth(){
        $this->health -=10;
    }
}