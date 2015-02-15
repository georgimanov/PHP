<form method="post">

    <fieldset>
        <legend>Personal Information</legend>
        <input type="text" name="fname" placeholder="First Name"><br/>
        <input type="text" name="lname" placeholder="Last Name"><br/>
        <input type="email" name="mail" placeholder="Email"><br/>
        <input type="text" name="phone" placeholder="Phone Number"><br/>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male"><br/>
        Birth Date<br/>
        <input type="date" name="birth-date"><br/>
        Nationality<br/>
        <select name="nationality">
            <option value="Bulgarian">Bulgarian</option>
            <option value="Russian">Russian</option>
            <option value="American">American</option>
        </select>

    </fieldset>
    <fieldset>
        <legend>Last Work Position</legend>
        Company
        <input type="text" name="company-name"><br/>
        From
        <input type="date" name="company-from"><br/>
        To
        <input type="date" name="company-to"><br/>
    </fieldset>
    <fieldset>
        <legend>Computer Skills</legend>
        <p>Programming Languages</p>
        <input type="text" name="programming-language">
        <select name="programming-language-level">
            <option value="beg">Beginner</option>
            <option value="int">Intermediate</option>
            <option value="adv">Advanced</option>
        </select>
        <br/>
        <input type="button" value="Remove Language">
        <input type="button" value="Add Language">

    </fieldset>
    <fieldset>
        <legend>Other Skills</legend>
        <p>Languages</p>
        <input type="text" name="foreign-language">
        <select name="foreign-language-comprehension">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
        </select>
        <select name="foreign-language-reading">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
        </select>
        <select name="foreign-language-writing">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
        </select>
        <br/>
        <input type="button" value="Remove Language">
        <input type="button" value="Add Language">

        <p>Driver's License</p>
        B<input type="checkbox" name="drv-license" value="B">
        A<input type="checkbox" name="drv-license" value="A">
        C<input type="checkbox" name="drv-license" value="C">

    </fieldset>
    <input type="submit" value="Generate CV">

</form>

<?php

//INPUT

if(isset($_POST['fname'])){
    if(OnlyLetters($_POST['fname'])){
        $fname = $_POST['fname']; //check
    } else {
        echo "Wrong First Name" . "<br>" ;
    }
}

if(isset($_POST['lname'])){
    if(OnlyLetters($_POST['lname'])){
        $lname = $_POST['lname']; //check
    } else {
        echo "Wrong Last Name" . "<br>" ;
    }
}

if(isset($_POST['mail'])){
    if(EmailCheck($_POST['mail'])){
        $mail = $_POST['mail']; //check
    } else {
        echo "Wrong E-mail" . "<br>" ;
    }
}

if(isset($_POSTp['phone'])){
    if(PhoneNumberCheck($_POSTp['phone'])){
        $phone = $_POST['phone']; //check
    } else {
        echo "Wrong Phone Number" . "<br>" ;
    }
}

$gender = $_POST['gender'];
$bday = $_POST['birth-date'];
$nationality = $_POST['nationality'];

if(isset($_POST['company-name'])){
    if(LettersAndNumbers($_POST['company-name'])){
        $companyName = $_POST['company-name'];
    } else {
        echo "Wrong Company Name" . "<br>" ;
    }
}

$companyFrom = $_POST['company-from'];
$companyTo = $_POST['company-to'];;

//PRINT RESULT

//Print Personal Info
echo "<table>";
echo "<tr>" . "<td colspan=\"2\">" . "Personal Info" . "</td>" ."</tr>";
echo "<tr>" . "<td>" . "First Name" . "</td>" . "<td>" . $fname . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "Last Name" . "</td>" . "<td>" . $lname . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "Email" . "</td>" . "<td>" . $mail . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "Phone Number" . "</td>" . "<td>" . $phone . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "Gender" . "</td>" . "<td>" . $gender . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "Birth Date" . "</td>" . "<td>" . $bday . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "Nationality" . "</td>" . "<td>" . $nationality . "</td>" . "</tr>";
echo "</table>";

//Print Last Work Position
echo "<table>";
echo "<tr>" . "<td colspan=\"2\">" . "Last Work Position" . "</td>" ."</tr>";
echo "<tr>" . "<td>" . "Company Name" . "</td>" . "<td>" . $companyName . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "From" . "</td>" . "<td>" . $companyFrom . "</td>" . "</tr>";
echo "<tr>" . "<td>" . "To" . "</td>" . "<td>" . $companyTo . "</td>" . "</tr>";
echo "</table>";

//Print Computer Skills
echo "<table>";
echo "<tr>" . "<td colspan=\"3\">" . "Computer Skills" . "</td>" ."</tr>";
echo "<tr>" . "<td>" . "Programming Languages" . "</td>" . "<td>" . $companyName . "</td>" . "</tr>";
echo "</table>";


//Print Other Languages

echo "<table>";
echo "<tr>" . "<td colspan=\"5\">" . "Other Languages" . "</td>" ."</tr>";
echo "<tr>" . "<td>" . "Languages" . "</td>" . "<td>" ."<tr><td>Language</td><td>Comprehension</td><td>Reading</td><td>Reading</td>" . "</td>" . "</tr>";
echo "</table>";


function OnlyLetters($testcase)
{
    if (ctype_alpha($testcase) && strlen($testcase) >= 2 && strlen($testcase) <= 20) {
        return true;
    } else {
        return false;
    }
}

function LettersAndNumbers($testcase)
{
    if (ctype_alnum($testcase) && strlen($testcase) >= 2 && strlen($testcase) <= 20) {
        return true;
    } else {
        return false;
    }
}

function PhoneNumberCheck($phone)
{
    $valid = true;
    $arr = array(" ", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-", " ");
    $count = strlen($phone);

    for ($i = 0; $i < $count; $i++) {
        if (array_search($phone[$i], $arr)) {
        } else {
            $valid = false;
            break;
        }
    }
    return $valid;

}

function EmailCheck($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
