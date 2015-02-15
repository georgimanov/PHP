
<form method="post">
    Starting Index :
    <input type="text" name="start">
    <input type="text" name="end">
    <input type="submit">
</form>
<?php
$start = $_POST['start'];
$end = $_POST['end'];

for ($i = $start; $i <= $end; $i++ ) {
    if(isPrime($i)){
        echo "<b>" . $i . "</b>";
    } else {
        echo $i;
    }

    if($i != $end){
        echo ", ";
    }
}

function isPrime($num) {
    //1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
    if($num == 1)
        return false;

    //2 is prime (the only even number that is prime)
    if($num == 2)
        return true;

    /**
     * if the number is divisible by two, then it's not prime and it's no longer
     * needed to check other even numbers
     */
    if($num % 2 == 0) {
        return false;
    }

    /**
     * Checks the odd numbers. If any of them is a factor, then it returns false.
     * The sqrt can be an aproximation, hence just for the sake of
     * security, one rounds it to the next highest integer value.
     */
    for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}

?>
