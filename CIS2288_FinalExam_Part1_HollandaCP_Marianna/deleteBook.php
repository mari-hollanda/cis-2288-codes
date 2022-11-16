<?php
/*
 * Delete Book Page
 * Author: Don Bowers,jdkitson and Marianna Hollanda
 * Date: 2021-12-09
 * Class: CIS2288
 * Description: Final Exam - Part 1
 */
session_start();
require_once ('checkLoggedIn.php');
require_once("lib/config.php");
$bookId = "";
$msg = "";
if (isset($_GET["bookId"]) && !empty($_GET["bookId"])) {
    $bookId = $mysqli->real_escape_string($_GET['bookId']);
    $query = "DELETE FROM books WHERE books.id =$bookId ";
    $result = $mysqli->query($query);
    if ($result) {
        $msg = "Record deleted successfully. ".$mysqli->affected_rows . " book deleted from database. <a href='index.php'>View all Books</a>";
    } else {
        $msg = "Error deleting record: " . $mysqli->error;
    }
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <?php require_once ('pageHead.php');?>
    <h2>CIS Book Inventory</h2>
    <p class="error"><?php echo $msg ?></p>

</div>
</body>
</html>
