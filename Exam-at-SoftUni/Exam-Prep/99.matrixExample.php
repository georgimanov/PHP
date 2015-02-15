<?php

$matrix = array(array());


//initialize array
for ($i = 0; $i < 10; $i++ ) {
    for ($j = 0; $j < 10; $j++ ) {
        $matrix[$i][$j] = '-';
    }
}

//echo array
for ($row = 0; $row < 10; $row++ ) {
    for ($col = 0; $col < 10; $col++ ) {
        echo $matrix[$row][$col];
    }
}

