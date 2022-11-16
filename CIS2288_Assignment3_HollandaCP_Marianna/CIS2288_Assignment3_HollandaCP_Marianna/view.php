<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-16
 * Class: CIS2288
 * Description: Assignment 3 - Acme International View Order
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

    th, td {
        padding: 15px;
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
<h2>Customer Orders</h2>

<?php
// store this in a variable in case we want to use it later - which we do
$pathToFile = $DOCUMENT_ROOT . "/orders/caseOrders.txt";

// open the file
$fp = fopen($pathToFile, 'r');

// if we can't find the file or it won't open, show a message
if (!$fp) {
    echo "<p style='text-align: center'><strong>Can't find the file. Sorry.</strong></p>";
    exit("</body></html>");
}

// check if the file is empty (no orders present)
if (filesize($pathToFile) == 0) {
    echo "<h4 style='text-align: center'>Sorry, file is empty.</h4>";
} else {
    // if we do have the file and it is not empty, while it is not the end of the file (file end of file - feof)
    // so basically keep looking through the file until we are done ;)
    // Use fgets function to get each record up to the file pointer (which in our case is hopefully the end of the file, store it in the order variable and append a <br> so that each order is on a new line

    echo '<table style="border: 0px; margin-left: auto; margin-right: auto">
            <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Iphone 12</th>
                <th>Iphone 13</th>
                <th>Samsung Galaxy</th>
                <th>Google Pixel</th>
                <th>Day</th>
                <th>Month</th>
                <th>Year</th>
                <th>Time</th>
                <th>Total Price</th>
            </tr>';

    // loop through each row
    while (($row = fgetcsv($fp, 0, "\t")) !== false) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>". $cell;
        }
        echo "</tr>";
    }
    echo '</table>';
}

// close the file resource
fclose($fp);

echo "<p style='text-align: center'><a href='resetFile.php'>Reset the file.</a></p>";

?>
</body>
</html>