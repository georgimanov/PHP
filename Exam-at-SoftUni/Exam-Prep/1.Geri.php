<?php
$input = "CPU, RAM, ROM, RAM, RAM, CPU, CPU, CPU, ROM, ROM, CPU, VIA, VIA";
$array = explode(", ", $input);
$secondArray = array_count_values($array);

if(sizeof($secondArray) > 3){

} else {

}

foreach($secondArray as $key=>$value){

}

function price($item){
    switch($item){
        case "CPU":
            return 85;
        case "RAM":
            return 45;
        case "ROM":
            return 35;
        case "VIA":
            return 45;
    }
}

