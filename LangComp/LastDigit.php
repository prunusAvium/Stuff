<?php
$input = trim(fgets(STDIN));
$number = intval($input);

$stringLastDigit = $input[strlen($input) - 1];
switch ($stringLastDigit){
    case "1":
        echo "one";
        break;
    case "2":
        echo "two";
        break;
    case "3":
        echo "tree";
        break;
    case "4":
        echo "four";
        break;
    case "5":
        echo "five";
        break;
    case "6":
        echo "six";
        break;
    case "7":
        echo "seven";
        break;
    case "8":
        echo "eight";
        break;
    case "9":
        echo "nine";
        break;
    case "0":
        echo "zero";
        break;
}



