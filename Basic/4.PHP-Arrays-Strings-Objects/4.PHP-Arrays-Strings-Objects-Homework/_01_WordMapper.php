<form method="post">
    <input type="text" name="input">
    <input type="submit">
</form>

<?php
$input = $_POST['input'];

$spliter = '/[.!\/?,!@#$%^&*(()_+]\g/';
$words = explode($spliter, $input);

?>