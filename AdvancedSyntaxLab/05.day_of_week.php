<?php
$input = trim(fgets(STDIN));
echo dayOfWeek($input);
function dayOfWeek(string $day) {
    if ($day == 'Monday')
        return 1;
     elseif ($day == 'Tuesday')
        return 2;
     elseif ($day == 'Wednesday')
        return 3;
     elseif ($day == 'Thursday')
        return 4;
     elseif ($day == 'Friday')
        return 5;
     elseif ($day == 'Saturday')
        return 6;
     elseif ($day == 'Sunday')
        return 7;
     else
        return "error";
}