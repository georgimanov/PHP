<?php

$input = $_GET['list'];
$maxSize = $_GET['maxSize'];

//$input = "    Java is an object-oriented programming language.
//    PHP is a server-side scripting language.
//    HTML is the standard markup language used to create web pages.
//
//    To define a table in HTML use <table>, <td> and <tr> tags.";
//$maxSize = 50;

$arr = explode("\n", $input);

$output = array();

foreach ($arr as $string) {
    $output[] = trim($string);
}


echo "<ul>";
foreach ($output as $i) {
    if (strlen($i) > 0) {
        echo "<li>";
        echo htmlspecialchars(trimToMaxSize($i,$maxSize));
        echo "</li>";
    }
}
echo "</ul>";


function trimToMaxSize($str, $maxSize){
    $result = "";
    if(strlen($str) >= $maxSize ){
        for ($i = 0; $i < $maxSize; $i++ ) {
            $result[] = $str[$i];
        }
        $result[] = '...';
        $result = implode("",$result);
    } else {
        $result = $str;
    }
    return $result;
}

?>