<?php
$n = 1234;
$array = array();

if( $n< 100){
    echo "no";
} else {
    for($i = 100; $i <= $n; $i++){
        if ( $i > 999){
            break;
        }
        if(checkNumber($i)){
            $array[] = $i;
        }
    }
}

for($i = 0; $i < sizeof($array); $i++){
    echo $array[$i];
    if($i < sizeof($array) - 1){
        echo ", ";
    }
}

function checkNumber($num){
    $a = $num %10; //ones
    $b = $num / 10 % 10; //tens
    $c = $num / 100 % 10; //hundreds
    if(($a !== $b) && ($a !== $c) && ($b !== $c)){
        return true;
    } else {
        return false;
    }
}
?>