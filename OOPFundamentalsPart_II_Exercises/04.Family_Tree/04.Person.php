<?php
declare(strict_types=1);

class Person {

    protected $name;
    protected $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    public function setAge(int $age)
    {
        if ($age < 1){
            throw new Exception('Age must be positive!');
        }
        $this->age = $age;
    }



}
