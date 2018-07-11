<?php
$numbers = [];
while ($number = intval(fgets(STDIN))){
    $numbers[] = $number;
}
echo "Max: " . max($numbers);