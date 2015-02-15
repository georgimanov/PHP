    <form method="post">
        Enter number of years :
        <input type="text" name="years">
        <input type="submit" value="Show Cost">
    </form>

    <table border="1">
        <th>Year</th>
        <th>Jan</th>
        <th>Feb</th>
        <th>Mar</th>
        <th>Apr</th>
        <th>May</th>
        <th>Jun</th>
        <th>Jul</th>
        <th>Aug</th>
        <th>Sep</th>
        <th>Oct</th>
        <th>Nov</th>
        <th>Dec</th>
        <th>Total</th>
        <?php
        $n = $_POST['years'];
        $currentYear = 2014;
        for ($i = 0; $i < $n; $i++ ) : //rows
            $sum = 0;
            ?> <tr> <td> <?php echo $currentYear - $i; ?> </td>  <?php
            for ($j = 0; $j < 12; $j++ ) : // cols;
                 ?> <td> <?php
                $num =rand(0, 999);
                echo $num;
                $sum +=$num;
                ?> </td> <?php
            endfor;

        ?> <td><?php echo $sum; ?> </td> </tr> <?php
            $sum = 0;
        endfor;
        ?>
    </table>