<?php

declare(strict_types = 1);
$data = [];
while (1){
    $input = trim(fgets(STDIN));
    if ($input == "Over"){
        break;
    }
    $data = explode(':', $input);

    if (preg_match('/^[0-9]{1,10}$/', $data[0])){
        $temp = $data[0];
        $data[0] = $data[1];
        $data[1] = $temp;
    }
    $results[$data[0]] = $data[1];
}
ksort($results);
foreach ($results as $name => $phone) {
    echo $name . ' -> ' . $phone . "\n";
}


