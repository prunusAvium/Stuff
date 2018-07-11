<?php
$input = trim(fgets(STDIN));
$secondLine = explode(' ', trim(fgets(STDIN)));

$searchedLine = $secondLine[0];
$number = intval($secondLine[1]);

$count = 0;
$hasChar = true;

for ($i = 0; $i <= strlen($input); $i++){
    if ($count == $number){
        $count = $i - 1;
        $hasChar = false;
        break;
    }

    if ($input[$i] == $searchedLine){
        $count++;
    }
}

if ($hasChar || count($secondLine) != 2){
    echo "Find the letter yourself!";
} else {
    echo $count;
}