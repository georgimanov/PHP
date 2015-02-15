<form method="post">
    <input type="text" name="str">
    <input type="radio" name="selection" id="palindrome" value="palindrome">
    <label for="palindrome">Check Palindrome</label>

    <input type="radio" name="selection" id="reverseStr" value="reverseStr">
    <label for="reverseStr">Reverse String</label>

    <input type="radio" name="selection" id="split" value="split">
    <label for="split">Split</label>

    <input type="radio" name="selection" id="hashStr" value="hashStr">
    <label for="hashStr">Hash String</label>

    <input type="radio" name="selection" id="shuffleStr" value="shuffleStr">
    <label for="shuffleStr">Shuffle String</label>

    <input type="submit">
</form>

<?php
$input = $_POST['str'];
$choice = $_POST['selection'];
$output = "";
    switch ($choice) {
        case 'palindrome' :
            $output = isPalindrome($input);
            break;
        case 'reverseStr' :
            $output = strrev($input);
            break;
        case 'split' :
            $output = splitAndPrint($input);
            break;
        case 'hashStr' :
            $output = hash('md5', $input);
            break;
        case 'shuffleStr' :
            $output = str_shuffle($input);
            break;
        default :
            echo " ";
            break;
}
echo $output;

function isPalindrome($word){
    $reverse = strrev($word); // reverse the word
    if ($word == $reverse) // compare if  the original word is same as the reverse of the same word
        return $word . " is a palindrome";
    else
        return $word . " is not a palindrome";
}

function splitAndPrint($word){
    $newWord = "";
    str_split($word, 1);{
        foreach (str_split($word, 1) as $i) {
            $newWord .= $i . " ";
        }
    }
    return $newWord;
}
?>