<form method="post">
    Input String :
    <input type="text" name="str">
    <input type="submit">
</form>
<table border="1">
    <?php
    if (isset($_POST['str'])) {
        $str = $_POST['str'];
        $input = explode(",", $str);
        foreach ($input as $i) {
            if (is_numeric($i)) {
                echo "<tr>" . "<td>" . $i . "</td>" . "<td>" . calcSum($i) . "</td>" . "</tr>";
            } else {
                echo "<tr>" . "<td>" . $i . "</td>" . "<td>" . "I cannot sum that." . "</td>" . "</tr>";
            }
        }
    }
    function calcSum($num)
    {
        $count = strlen($num);
        $sum = 0;
        for ($i = 0; $i < $count; $i++) {
            $sum += $num % 10;
            $num = round($num / 10, 0);
        }
        return $sum;
    }
    ?>
</table>