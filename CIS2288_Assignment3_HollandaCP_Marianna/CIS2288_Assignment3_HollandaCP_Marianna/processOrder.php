<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-16
 * Class: CIS2288
 * Description: Assignment 3 - Acme International Process Order
 * Source: Now Saving Orders - Class example
 */

if (!isset($_POST["Submit"])) {

    header("Location: orderForm.php");
    exit;
}

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$date = date('h:i, jS F Y');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Acme Accessories Inc - Customer Orders</title>
</head>
<body>
<style>
    body {
        background-color: #ff94c9;
        color: white;
        font-family: Georgia, sans-serif;
    }

    h2 {
        color: white;
        text-align: center;
        font-family: "Lucida Console", sans-serif;
    }

    ul {
        border: 2px solid #e26ea8;
        background-color: #e26ea8;
    }

    li {
        text-align: left;
        display: inline;
    }

    li a {
        color: white;
        padding: 9px 17px;
        text-decoration: none;
    }

</style>
<nav>
    <ul>
        <li>
            <a href="orderForm.php">Order Form</a>
        </li>
        <li>
            <a href="view.php">View Order</a>
        </li>
        <li>
            <a href="resetFile.php">Reset</a>
        </li>
    </ul>
</nav>
<h2>Acme Accessory Sales</h2>

<?php

//Here we can use empty to ensure that they order at least one thing
if (empty($_POST['name']) && empty($_POST['phoneNum'])) {
    echo "<p>You must enter your Name and Phone Number before placing the order. <a href='orderForm.php'>Try again</a></p></body></html>";
    //exit the script without executing anything else
    exit;
}

if ($_POST['iphoneTwelve'] == 0 && $_POST['iphoneThirteen'] == 0 &&
    $_POST['samsungGalaxy'] == 0 && $_POST['googlePixel'] == 0) {
    echo "<p>You must order something. <a href='orderForm.php'>Try again</a></p></body></html>";
    //exit the script without executing anything else
    exit;
}

//Declare variables
$name = $_POST['name'];
$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$iphoneTwelve = (int)$_POST['iphoneTwelve'];
$iphoneThirteen = (int)$_POST['iphoneThirteen'];
$samsungGalaxy = (int)$_POST['samsungGalaxy'];
$googlePixel = (int)$_POST['googlePixel'];

//Variable to calculate the order
$total = 0;
$deliveryTotal = 0;
$finalTotal = 0;
$tax = 0;

//Declare constants
define("IPHONE_TWELVE", 15.50);
define("IPHONE_THIRTEEN", 20);
define("SAMSUNG_GALAXY", 17.5);
define("GOOGLE_PIXEL", 16.5);
define('TAX', 0.15);
define("DELIVERY_COST", 5);

// set date for order record in file
$time = date('h:ia');
$month =  date('F');
$day =  date('j');
$year = date('Y');

//Calculating the total:
$total = ($iphoneTwelve * IPHONE_TWELVE) +
         ($iphoneThirteen * IPHONE_THIRTEEN) +
         ($samsungGalaxy * SAMSUNG_GALAXY) +
         ($googlePixel * GOOGLE_PIXEL);

//Tax Calculation
$tax = $total * TAX;


    date_default_timezone_set('America/Halifax');
    echo "<p>Order processed on " . date('H:i, jS F Y') . "</p>";
    echo "<p>Name: " . htmlspecialchars($name) . "</p>";
    echo "<p>Phone Number: " . htmlspecialchars($phoneNum) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Net amount before tax " . htmlspecialchars(number_format("$total", 2));
    echo "<p>Tax amount " . htmlspecialchars(number_format("$tax", 2));

    //Delivery Calculation
    if ($total <= 65){
        $total = $total + DELIVERY_COST;
        echo "<p>Delivery amount " . htmlspecialchars(number_format(DELIVERY_COST, 2));
    }else{
        echo "<p>Delivery amount: Free";
    }

    //Total Calculation
    $finalTotal = $total + $tax;

    echo "<p>Total amount " . htmlspecialchars(number_format("$finalTotal", 2));

    //piecing together our string to save in our text file
    $outputString = $name . "\t" . $phoneNum . "\t" . $email . "\t" . $iphoneTwelve . " Iphone 12\t" . $iphoneThirteen . " Iphone 13\t" .
        $samsungGalaxy . " Samsung\t" . $googlePixel . " Pixel\t" . $day . "\t" . $month . "\t" . $year . "\t" . $time . "\t\$" . $finalTotal . "\r\n";

    // open file for writing 'w'
    // see more options here - http://www.php.net/manual/en/function.fopen.php
    // from php.net -> w mode: Open for writing only; place the file pointer at the beginning of the file and truncate the               file to zero length. If the file does not exist, attempt to create it. Try the option of a+ to append more data the file.
    // append mode might be best :)
    $fp = fopen("$DOCUMENT_ROOT/orders/caseOrders.txt", 'a+');

    if (!$fp) {
        echo "<p><strong> Your order could not be processed at this time.
                    Please try again later.</strong></p></body></html>";
        exit;
    }

    flock($fp, LOCK_EX);
   // fwrite($fp, $outputString, strlen($outputString));
    fwrite($fp, $outputString);
    flock($fp, LOCK_UN);
    fclose($fp);

    //echo when the order was processed
    echo "<p>Order processed at ".date('h:ia \o\n F jS, Y')."</p>";
    echo "<p><a href='view.php'>View all orders.</a></p>";
    ?>
</body>
</html>

