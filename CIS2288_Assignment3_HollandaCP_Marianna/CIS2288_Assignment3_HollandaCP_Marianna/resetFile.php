<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-16
 * Class: CIS2288
 * Description: Assignment 3 - Acme International Reset File
 * Source: Now Saving Orders - Class example
 */

//Create short variable name
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
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
// store this in a variable in case we want to use it later - which we do
$pathToFile = $DOCUMENT_ROOT . "/orders/caseOrders.txt";


// open the file
$fp = fopen($pathToFile, 'r');

// if we can't find the file or it won't open, show a message
if (!$fp) {
    echo "<p><strong>Can't find the file. Sorry.</strong></p>";
    exit("</body></html>");
} else {
    unlink($pathToFile);
    echo "<h2>The file has been removed</h2>";
    echo "<p style='text-align: center'><a href='orderForm.php'>Place another order.</a></p>";

}
?>
</body>
</html>