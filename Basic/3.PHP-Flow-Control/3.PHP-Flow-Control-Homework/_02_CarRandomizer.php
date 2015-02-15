<form method="post" xmlns="http://www.w3.org/1999/html">
    Enter cars
    <input type="text" name="cars">
    <input type="submit" value="Show Result">
</form>

<?php
$input = $_POST['cars'];
$cars = explode(", ", $input);
$colors = array("yellow", "green", "black", "blue", "white", "red", "purple");
?>

<table border="1">
    <th>Car</th>
    <th>Color</th>
    <th>Count</th>

    <?php
    foreach ($cars as $car): ?>
        <tr>
            <td> <?php echo $car; ?> </td>
            <td> <?php echo $colors[rand(0, 6)]; ?> </td>
            <td> <?php echo rand(0, 5); ?> </td>
        </tr>
    <?php
    endforeach; ?>
</table>