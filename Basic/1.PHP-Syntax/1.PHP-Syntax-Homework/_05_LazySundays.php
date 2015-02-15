<?php
date_default_timezone_set("Europe/Sofia");

$format = "jS F, Y";
$day = '1';
$month = '8';
$year = '2014';
$date = mktime(0, 0, 0, date($month), date($day), date($year));

for ($i = 1; $i<31; $i++){
    $date += 86400;

    if (date('D', $date) == "Sun"){
        echo date($format, $date). "\n";
    }
}

