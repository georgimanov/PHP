<?php

$len = 40;
$size = 10;

$rows = 0;

if ($len % $size > 0){
    $rows = $len / $size + 1;
} else {
    $rows = $len / $size;
}

echo round($rows,0);