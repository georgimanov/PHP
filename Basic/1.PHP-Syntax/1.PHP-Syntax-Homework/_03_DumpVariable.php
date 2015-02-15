<?php

$string = "hello";
//$number = 15;
//$double = 1.234;
//$myArr = array(1,2,3);
//%myObj = (object)[2,34];

$var = $string;

if ( is_numeric($var)){
    echo var_dump($var);
} else {
    echo gettype($var);
}

?>
