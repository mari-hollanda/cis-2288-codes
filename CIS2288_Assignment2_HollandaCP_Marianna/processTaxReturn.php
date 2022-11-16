<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-09-29
 * Class: CIS2288
 * Description: Assignment 2 - PEI Income Tax
 */

//Declare variables
$title = $_POST['title'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$addrPCode = $_POST['addrPCode'];
$address = $_POST['address'];
$income = $_POST['income'];
$student = isset($_POST['student']);

//Variable to calculate the income tax
$incomeTax = 0;
$incomeAfterTax = 0;

//Declare constants
define("TAXPERCENTAGE", 0.18);
define("TAXEXEMPTION", 16500);
define("STUDENTEXEMPTION", 23000);

//Tax Calculation
if ($income > TAXEXEMPTION) {
    if ($student) {
        $incomeTax = ($income - STUDENTEXEMPTION) * TAXPERCENTAGE;
    } else {
        $incomeTax = ($income - TAXEXEMPTION) * TAXPERCENTAGE;
    }
}

$incomeAfterTax = $income - $incomeTax;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>B2021 PEI Income Tax Return Form</title>
</head>
<body>
<style>
    .center-justified {
        text-align: justify;
        margin: 0 auto;
        width: 30em;
    }
</style>
<div class="center-justified">
    <h2>2021 PEI Income Tax Return Form</h2>

    <?php
    date_default_timezone_set('America/Halifax');
    echo "<p>Output registered at " . date('H:i, jS F Y') . "</p>";

    echo "<p>Name: " . $title . " " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "</p>";
    echo "<p>Address: " . htmlspecialchars($address) . " " . htmlspecialchars($addrPCode) . "</p>";
    echo "<p>Amount of tax: " . number_format($incomeTax);
    echo "<p>Amount of income after tax: " . number_format($incomeAfterTax);
    ?>

</body>
</html>

