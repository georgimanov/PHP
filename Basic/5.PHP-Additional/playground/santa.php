<?php

// Input
$name = $_GET['childName'];
$present = $_GET['wandtedPresent '];
$riddles = $_GET['riddles'];
$encryptResult = '';

// Get elements
$nameLength =  strlen($name);
$arrRiddles = explode(';',$riddles);
$countRiddles = count($arrRiddles);
$riddleToPlayWith = $arrRiddles[ ($nameLength % $countRiddles) - 1 ];

$stringToEncrypt = '$giftOf[' . $name . '] = $[wasChildGood]? \'[' . $present . ']\' : \'[' . $riddleToPlayWith . ']\'';

for ($index = 0; $index < strlen($stringToEncrypt); $index ++ ){
    $encryptResult .= (ord($stringToEncrypt[$index]) + $nameLength);
}
// Output
echo $encryptResult;
