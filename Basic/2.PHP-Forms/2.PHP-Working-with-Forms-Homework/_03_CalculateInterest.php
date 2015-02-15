<form action="" method="post">
    Enter amount:
    <input type="text" name="amount"><br/>

    <input type="radio" name="currency" id="USD" value="$">
    <label for="USD">USD</label>

    <input type="radio" name="currency" id="EUR" value="&#128;">
    <label for="EUR">EUR</label>

    <input type="radio" name="currency" id="BGN" value="BGN">
    <label for="BGN">BGN</label>
    <br/>


    Compound Interest Amount
    <input type="text" name="interest"><br/>

    <select name="periods">
        <option value="6m">6 months</option>
        <option value="1y">1 year</option>
        <option value="2y">2 years</option>
        <option value="5y">5 years</option>
    </select>

    <input type="submit" value="Calculate"><br/>
</form>

<?php
if(isset($_POST['amount']) && isset($_POST['interest']) && isset($_POST['currency'])){
    $amount = $_POST['amount'];
    $interest = $_POST['interest'];
    $currency = $_POST['currency'];
    $periods = $_POST['periods'];

    switch($periods){
        case '6m' :  $periods = 6; break;
        case '1y' :  $periods = 12; break;
        case '2y' :  $periods = 24; break;
        case '5y' :  $periods = 60; break;
    }

    $income = 0;
    for ($i = 0; $i < $periods; $i++ ) {
        $income = $amount * (($interest / 12) / 100 ) ;
        $amount = $amount + $income;
    }

    echo $currency . " " . round($amount,2);

}
?>