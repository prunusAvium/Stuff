<?php
declare(strict_types=1);
class Person
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}