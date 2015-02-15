<table border="1">
    <th>Number</th>
    <th>Square</th>
    <?php
    $sum = 0;
    $sqrtNum = 0;
    for ($i = 0; $i <= 100; $i++) :
        if ($i % 2 == 0):
            $sqrtNum = round(sqrt($i), 2);
            $sum += round($sqrtNum, 2);
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $sqrtNum; ?></td>
            </tr>
        <?php   endif;
    endfor; ?>
    <tr>
        <td><b>Total</b></td>
        <td><?php echo $sum; ?></td>
    </tr>
</table>