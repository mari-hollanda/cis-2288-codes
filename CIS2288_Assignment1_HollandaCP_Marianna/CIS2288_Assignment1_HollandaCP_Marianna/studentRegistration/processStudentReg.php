<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-09-15
 * Class: CIS2288
 * Description: Assignment 1 - Student Registration
 */

//Declare variables
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$addrStreet = $_POST['addrStreet'];
$addrNumber = $_POST['addrNumber'];
$addrPCode = $_POST['addrPCode'];
$addrCity = $_POST['addrCity'];
$addrProvince = $_POST['addrProvince'];
$phoneNum = $_POST['phoneNum'];
$numSemesters = $_POST['numSemesters'];
$numCourses = $_POST['numCourses'];
$healthDeduction = $_POST['healthDeduction'];
$scholarship = $_POST['scholarship'];

//Variable to calculate the student's tuition cost
$tuitionCost = 0;

//Declare constants
define("COURSEPRICE", 800);

//Tuition Calculation
$tuitionCost = (((COURSEPRICE * $numCourses * $numSemesters) - $healthDeduction) - $scholarship);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<!-- Style from: https://stackoverflow.com/questions/4704896/how-to-center-justify-the-last-line-of-text-in-css -->
<style>
    .center-justified {
        text-align: justify;
        margin: 0 auto;
        width: 30em;
    }
</style>
<div class="center-justified">
<h1>Holland College</h1>
<h2>Student Registration</h2>

<?php
    date_default_timezone_set('America/Halifax');
    echo "<p>Student registered at " . date('H:i, jS F Y') . "</p>";
    echo "<p>The students name is: " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "</p>";
    echo "<p>The students address is: " . htmlspecialchars($addrNumber) . " " . htmlspecialchars($addrStreet) . " " .
        htmlspecialchars($addrCity) . " " . htmlspecialchars($addrProvince) . " " . htmlspecialchars($addrPCode) . "</p>";
    echo "<p>The students phone number is: " . htmlspecialchars($phoneNum) . "</p>";
    echo "<p>The students tuition cost is: " . number_format($tuitionCost). ". They are taking " .
        htmlspecialchars($numCourses) . " course a semester for " . htmlspecialchars($numSemesters) . " semesters.";
?>
</div>
</body>
</html>