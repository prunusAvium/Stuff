<?php
$groupSize = intval(trim(fgets(STDIN)));
$package = trim(fgets(STDIN));
$totalPrice = 0;
if ($groupSize <=50){
    $totalPrice = 2500;
    echo "We can offer you the Small Hall\n";
} elseif ($groupSize > 50 && $groupSize <=100){
    $totalPrice = 5000;
    echo "We can offer you the Terrace\n";
} elseif($groupSize > 100 && $groupSize <= 120) {
    $totalPrice = 7500;
    echo "We can offer you the Great Hall\n";
} else {

    echo "We do not have an appropriate hall.";
}

if ($package == "Normal"){
    $totalPrice += 500;
    $totalPrice -= $totalPrice * 0.05;
} elseif ($package == "Gold"){
    $totalPrice += 750;
    $totalPrice -= $totalPrice * 0.10;
}else {
    $totalPrice += 1000;
    $totalPrice -= $totalPrice * 0.15;
}
$pricePerPerson = round(($totalPrice / $groupSize), 2);
if($groupSize <=120){
    echo "The price per person is $pricePerPerson\$";
}

