<h1>Problem 7.	Form Data</h1>
<form action="<?php $_PHP_SELF ?>" method="post">
    <input type="text" name="name" placeholder="Name"><br/>
    <input type="text" name="age" placeholder="Age"><br/>
    <input type="radio" name="sex" value="male">Male<br/>
    <input type="radio" name="sex" value="female">Female<br/>
    <input type="submit"/>
</form>

<?php
$name = $_POST[name];
$age = $_POST[age];
$gender = $_POST[sex];
if($_POST[sex] == "male" || $_POST[sex] == "female"){
    echo "My name is " . $name . ". I am " . $age . " years old. I am " . $gender . ".";

}
?>