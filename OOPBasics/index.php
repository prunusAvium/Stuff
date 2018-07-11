<?php

class Human {
    private $fname;
    public $lname;
    public $city;

    function setFname($t){
        if ($t == ""){
            echo 'Empty fname';
            return;
        }
        $this->fname = $t;
    }

    function getFname(){
        return $this->fname;
    }
}

$human1 = new Human;
$human1->setFname('Ivan');

print_r($human1->getFname());
