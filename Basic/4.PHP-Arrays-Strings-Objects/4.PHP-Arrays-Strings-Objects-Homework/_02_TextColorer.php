<form method="post">
    <input type="text" name="input">
    <input type="submit">
</form>

<?php

$input = $_POST['input'];

$output = str_split($input,1);

$count = sizeof($output);

for ($i = 0; $i < $count; $i++ ) {
    $oddEven = ord($output[$i]);
    if($oddEven % 2 != 0) {
        echo '<span style="color:blue;" >' . $output[$i] . " " . '</span>';
    } else {
        echo '<span style="color:red;" >' . $output[$i] . " " . '</span>';
    }
}
?>