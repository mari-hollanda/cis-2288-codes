<?php
/*
 * Add Book Page
 * Author: Don Bowers,jdkitson and Marianna Hollanda
 * Date: 2021-12-09
 * Class: CIS2288
 * Description: Final Exam - Part 1
 */
session_start();
require_once('checkLoggedIn.php');
?>
<!doctype html>
<html>
<head>
    <title>Book-O-Rama Book - Add New Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <?php require_once('pageHead.php'); ?>
    <h1>Book-O-Rama Book - Add Book</h1>
    <?php
    require_once("lib/utilities.php");
    if (isset($_POST['submit'])) {

        // create short variable names
        $isbn = test_input($_POST['isbn']);
        $author = test_input($_POST['author']);
        $title = test_input($_POST['title']);
        $price = test_input($_POST['price']);

        if (empty($isbn) || empty($author) || empty($title) || empty($price)) {
            header("location:newBook.php?error=empty");
            exit();
        }

        //Create DB object
        require_once('lib/config.php');

        $isbn = $mysqli->real_escape_string($isbn);
        $author = $mysqli->real_escape_string($author);
        $title = $mysqli->real_escape_string($title);
        $price = $mysqli->real_escape_string(doubleval($price));

        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.  Please try again later.";
            exit;
        }

        $query = "INSERT INTO books VALUES (NULL,'" . $isbn . "', '" . $author . "', '" . $title . "', " . $price . ")";
        $result = $mysqli->query($query);

        if ($result) {
            echo $mysqli->affected_rows . " book inserted into database. <a href='viewBooks.php'>Add another?</a>";

            //Display book inventory
            $query = "SELECT * FROM books";
            $result = $mysqli->query($query);
            $num_results = $result->num_rows;

            echo "<p>Number of books found: " . $num_results . "</p>";

            echo "<h2>CIS Book Inventory</h2>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            if ($num_results > 0) {
                $books = $result->fetch_all(MYSQLI_ASSOC);
                echo "<table class='table table-bordered'><tr>";

                //This dynamically retrieves header names
                foreach ($books[0] as $k => $v) {
                    echo "<th>" . $k . "</th>";
                }
                echo "</thead>";
                echo "<tbody>";

                //Create a new row for each book
                foreach ($books as $book) {
                    echo "<tr>";
                    foreach ($book as $k => $v) {
                        echo "<td>" . $v . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            $result->free();
            $mysqli->close();
        } else {
            echo "An error has occurred.  The item was not added. <a href='viewBooks.php'>Try again?</a>";
        }
    } else {
        header("location:newBook.php?error=noform");
        exit();
    }
    ?>
</div>
</body>
</html>

