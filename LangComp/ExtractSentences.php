<?php
$word = trim(fgets(STDIN));
$text = trim(fgets(STDIN));
$re = '/[\!\.?]/';
$wordPattern = '/\b' . $word . '\b/';
$sentences = preg_split($re, $text);
foreach ($sentences as $sentence){
    $match = preg_match($wordPattern, $sentence);
    if ($match){
        echo trim($sentence) . PHP_EOL;
    }
}
