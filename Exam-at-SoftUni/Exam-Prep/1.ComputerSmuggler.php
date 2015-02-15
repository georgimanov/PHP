<?php
$input = $_GET['list'];
//$input = "CPU, RAM, ROM, RAM, RAM, CPU, CPU, CPU, ROM, ROM, CPU, VIA, VIA";
$arr = explode(", ", $input);
$arr = array_count_values($arr);
$validParts = array();
$computersAssembled = 1000;
$expenses = 0;
$income = 0;
$incomeFromLeftovers = 0;
$totalIncome = 0;
$computerPrice = 420;
$partsLeft = 0;
$profit = 0;
$result = 0;

//arr with needed values for computer assembly :
foreach ($arr as $part => $count) {
    if (checkPart($part)) {
        $validParts[$part] = $count;
    }
}
//total computers assembled
foreach ($validParts as $part => $count) {
    if ($computersAssembled >= $count) {
        $computersAssembled = $count;
    }
}

if (sizeof($validParts) <= 3){
    $computersAssembled = 0;
}

//income from sold computers
$income = $computersAssembled * $computerPrice;

//get the amount of expenses
foreach ($validParts as $part => $count) {
    $expenses += $count * getDiscount($count) * getPrice($part);
}

//parts left (+ half the price sold)
foreach ($validParts as $part => $count) {
    $partsLeft += $count - $computersAssembled;
    if (($count - $computersAssembled) > 0) {
        $incomeFromLeftovers += ($count - $computersAssembled) * getPrice($part) / 2;
    }
}

//check if Nakov gained or lost money
$totalIncome = $income + $incomeFromLeftovers;
$profit = $totalIncome - $expenses;
if ($profit > 0) {
    $result = '<p>Nakov gained ' . $profit . ' leva</p>';
} else {
    $result = '<p>Nakov lost ' . $profit . ' leva</p>';
}

//print result
echo '<ul>';
echo '<li>' . $computersAssembled . ' computers assembled</li>';
echo '<li>' . $partsLeft . ' parts left</li>';
echo '</ul>';
echo $result;

//FUNCTIONS USED

//returns the price of the current part
function getPrice($part)
{
    switch ($part) {
        case 'CPU' :
            return 85;
        case 'RAM' :
            return 35;
        case 'ROM' :
            return 45;
        case 'VIA' :
            return 45;
    }
}

//return 1/2 if the customer gets a discount
function getDiscount($count)
{
    $discount = 1;
    if ($count >= 5) {
        $discount = 0.5;
    }
    return $discount;
}

//return true if the part is valid
function checkPart($part)
{
    switch ($part) {
        case 'CPU' :
        case 'RAM' :
        case 'ROM' :
        case 'VIA' :
            return true;
        default :
            return false;
    }
}

?>