<?php
declare(strict_types=1);

class Human {
    private $firstName;
    private $lastName;

    protected function setFirstName(string $firstName){
        if (!ctype_upper($firstName[0])){
            throw new Exception("Expected upper case letter! Argument: " . $firstName);
        }
        if (strlen($firstName) < 4){
            throw new Exception("Expected length at least 4 symbols!Argument: " . $firstName);
        }
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName){
        if (!ctype_upper($lastName[0])){
            throw new Exception("Expected upper case letter! Argument: " . $lastName);
        }
        if (strlen($lastName) < 3){
            throw new Exception("Expected length at least 3 symbols!Argument: ". $lastName);
        }
        $this->lastName= $lastName;
    }

    public function __toString()
    {
        return "First Name: " . $this->firstName . PHP_EOL . "Last Name: " . $this->lastName . PHP_EOL;
    }
}