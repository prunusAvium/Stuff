<?php
declare(strict_types=1);

include '07.Car.php';
include '07.Enguine.php';

$enguine_nums = readline();

for ($i = 0; $i < $enguine_nums; $i++){

    $displacement = null;
    $efficiency = null;

    $line = explode(' ', readline());
    list($model, $power, $displacement, $efficiency)= $line;
    if (count($line) > 2){
        $displacement = $line[2];
        if (count($line) > 3) {
            $efficiency = $line[3];
        }
    }
    $enguiines[] = new Enguine($model, $power, $displacement, $efficiency);


}

/*<?php
	$me = new Lover;

	$me->partner = $you;

	$me->feelings = array('adore','miss','want','love');

	foreach ($feelings as $feeling) {

        $me->express_feeling($feeling);

        if ($you->feeling_mutual($feeling))
            $me->epic_hugs($you);
    }
*/