<?php
//$inputBoard = $_GET['board'];
//$$inputEnteringPosition = $_GET['beginning'];
//$moves = $_GET['moves'];

//HADCODE INPUT :
$inputBoard = 'P I F S | P 0 0 F | N 0 0 V | I F F I';
$inputEnteringPosition = '2 1';
$inputMoves = '5 11 9 8 6 8 4';
//end HARDCODE INPUT;


//get BOARD
$board = array();
$pattern = "/[A-Z0-9-]/";
preg_match_all($pattern, $inputBoard, $out);
foreach ($out as $key=>$value) {
    foreach ($value as $k=>$i) {
        $board[$k] = $i;
    }
}

foreach ($board as $b) {
    echo $b . " ";
}


//Get Entering Positions and moves
$enteringPosition = explode(" ", $inputEnteringPosition);
$moves = explode(" ", $inputMoves);




?>