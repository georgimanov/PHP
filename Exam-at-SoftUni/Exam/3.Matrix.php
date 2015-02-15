<?php
$text = $_GET['text'];
$lineLength = $_GET['lineLength'];

$matrix = array(array());
$cols = $lineLength;

$rows = 0;

$len = strlen($text);
$size = $lineLength;

if ($len % $size > 0) {
    if ($lineLength == 1) {
        $rows = $len;
    } else {
        $rows = intval(strlen($text) / $lineLength) + 1;
    }
} else {
    $rows = intval(strlen($text) / $lineLength);
}

$placeHolder = 0;

//initialize matrix with provided input
for ($row = 0; $row < $rows; $row++) {
    for ($col = 0; $col < $cols; $col++) {
        if ($text[$placeHolder] != "") {
            $matrix[$row][$col] = $text[$placeHolder];
            $placeHolder++;
        } else {
            $matrix[$row][$col] = " ";
        }
    }
}

//initialize outputMatrix
for ($row = $rows - 1; $row >= 0; $row--) {
    for ($col = 0; $col < $cols; $col++) {
        if ($matrix[$row][$col] == " ") {
            $rowWithChar = 0;
            for ($i = $row; $i >= 0; $i--) {
                if ($matrix[$row - 1 - $rowWithChar][$col] != " ") {
                    break;
                } else {
                    $rowWithChar++;
                }
            }
            $matrix[$row][$col] = $matrix[$row - 1 - $rowWithChar][$col]; //get upper char
            $matrix[$row - 1 - $rowWithChar][$col] = " "; // clear upper char
        }
    }
}

//echo outputMatrix
echo "<table>";
for ($row = 0; $row < $rows; $row++) {
    echo "<tr>";
    for ($col = 0; $col < $cols; $col++) {
        echo "<td>";
        if ($matrix[$row][$col] == "") { //not necessary
            echo " ";
        } else {
            echo htmlspecialchars($matrix[$row][$col]);
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "<table>";

?>