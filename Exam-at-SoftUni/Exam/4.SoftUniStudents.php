<?php
//$sortBy = $_GET['column'];
//$order = $_GET['order'];
//$inputStudents = $_GET['students'];

$inputStudents = "Pesho  , pesho.g@gmail.com, onsite, 400 \n";
$sortBy = "username"; // "id", "username", "result"
$order = "descending"; // "ascending" or  "descending"

$studentsInput = explode("\n", $inputStudents);

foreach ($studentsInput as $line) {
    if(!empty($line)){
        $studentsLines[] = $line;
    }
}

for ($i = 0; $i < sizeof($studentsLines); $i++) {
    $studentsLines[$i] = ($i + 1) . ", " . $studentsLines[$i];
}

$students = array();
for ($i = 0; $i < sizeof($studentsLines); $i++) {
    $students[$i] = explode(", ", trim($studentsLines[$i]));
}

if ($sortBy == "id" && $order == "ascending") {
    usort($students, 'compareIdAscending');
} else if ($sortBy == "id" && $order == "descending") {
    usort($students, 'compareIdDescending');
} else if ($sortBy == "username" && $order == "ascending") {
    usort($students, 'compareUsernameAscending');
} else if ($sortBy == "username" && $order == "descending") {
    usort($students, 'compareUsernameDescending');
} else if ($sortBy == "result" && $order == "ascending") {
    usort($students, 'compareResultAscending');
} else if ($sortBy == "result" && $order == "descending") {
    usort($students, 'compareResultDescending');
}

//print result
echo "<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>";

foreach ($students as $student) {
    echo "<tr>";
    foreach ($student as $key => $val) {
        echo "<td>" . htmlspecialchars($val) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

//Sorting functions
function compareIdAscending($a, $b) //Ascending by ID
{
    if ($a[0] == $b[0]) {
        return 0;
    }
    return ($a[0] < $b[0]) ? -1 : 1;
}

function compareIdDescending($a, $b) //Descending by ID
{
    if ($a[0] == $b[0]) {
        return 0;
    }
    return ($a[0] > $b[0]) ? -1 : 1;
}

function compareUsernameAscending($a, $b) //Ascending by Username
{
    if (strcmp(trim($a[1]), trim($b[1])) == 0) {
        return ($a[0] < $b[0]) ? -1 : 1;
    } else if (strcmp(trim($a[1]), trim($b[1])) < 0) {
        return -1;
    } else {
        return 1;
    }
}

function compareUsernameDescending($a, $b) //Descending by Username
{
    $a[0] = preg_replace('/\s+/', '', $a[0]);
    $b[0] = preg_replace('/\s+/', '', $b[0]);
    if (strcmp(trim($a[1]), trim($b[1])) == 0) {
        return ($a[0] > $b[0]) ? -1 : 1;
    } else if (strcmp(trim($a[1]), trim($b[1])) > 0) {
        return -1;
    } else {
        return 1;
    }
}

function compareResultAscending($a, $b) //Ascending by Result
{
    if ($a[4] == $b[4]) {
        return ($a[0] < $b[0]) ? -1 : 1;
    }
    return ($a[4] < $b[4]) ? -1 : 1;
}

function compareResultDescending($a, $b) //Descending by Result
{
    if ($a[4] == $b[4]) {
        return ($a[0] > $b[0]) ? -1 : 1;
    }
    return ($a[4] > $b[4]) ? -1 : 1;
}
?>