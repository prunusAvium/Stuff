<?php
declare(strict_types=1);

class Student extends Human {
    private $facultyNum;

    public function __construct(string $firstName, string $lastName, string $facultyNum)
    {
        parent::setFirstName($firstName);
        parent::setLastName($lastName);
        $this->setFacultyNum($facultyNum);
    }

    private function setFacultyNum(string $facultyNum){
        if (strlen($facultyNum) < 5 or strlen($facultyNum) > 10){
            throw new Exception("Invalid Faculty number!");
        }
        $this->facultyNum = $facultyNum;
    }

    public function __toString()
    {
        return parent::__toString() .
            "Faculty number: " . $this->facultyNum . PHP_EOL;
    }
}