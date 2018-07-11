<?php
declare(strict_types=1);
include '03.Human.php';
include '03.Student.php';
include '03.Worker.php';

$firstLine = explode(' ', trim(fgets(STDIN)));
$student = new Student($firstLine[0], $firstLine[1], $firstLine[2]);

$secondLine = explode(' ',trim(fgets(STDIN)));
$worker = new Worker($secondLine[0], $secondLine[1], floatval($secondLine[2]), floatval($secondLine[3]));

echo $student . PHP_EOL . $worker;