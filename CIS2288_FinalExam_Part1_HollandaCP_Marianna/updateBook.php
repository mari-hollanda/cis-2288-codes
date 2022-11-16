<?php
/*
 * Update Book Page
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
    <title>Book-O-Rama - Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <h1>Book-O-Rama</h1>
    <!-- <p><a href="newBook.php">Add a new book</a> - <a href="inventory.php">View all Books</a></p>-->
    <?php
    if (isset($_POST['submit'])) {
        // create short variable names
        $bookId = $_POST['bookId'];
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $title = $_POST['title'];
        $price = $_POST['price'];

        if (empty($isbn) || empty($author) || empty($title) || empty($price)) {
            echo "You have not entered all the required details.<br />"
                . "Please go back and try again.</body></html>";
            exit;
        }

        require("lib/config.php");
        $isbn = $mysqli->real_escape_string($isbn);
        $author = $mysqli->real_escape_string($author);
        $title = $mysqli->real_escape_string($title);
        $price = $mysqli->real_escape_string(doubleval($price));

        // example UPDATE query
        $query = "UPDATE books SET isbn='$isbn', title='$title', author='$author', price=$price WHERE books.id=$bookId LIMIT 1";
        $result = $mysqli->query($query);

        if ($result) {
            echo $mysqli->affected_rows . " book updated in database. <a href='index.php'>View all Books</a>";

            //Order Detail Report Query
            $query = "SELECT *
             FROM `books`
                where books.id=$bookId";

            $result = $mysqli->query($query);
            $num_results = $result->num_rows;

            if ($num_results > 0) {
                $books = $result->fetch_all(MYSQLI_ASSOC);

                echo "<table class='table table-bordered'><tr>";
                foreach ($books[0] as $k => $v) {
                    echo "<th>" . $k . "</th>";
                }
                echo "</tr>";

                //Create a new row for each book
                foreach ($books as $book) {
                    echo "<tr>";
                    foreach ($book as $k => $v) {
                        echo "<td>" . $v . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // if no results
                echo "<p>Sorry there are no entries in the database.</p>";
            }
            $result->free();
            $mysqli->close();
        } else {
            echo "An error has occurred.  The item was not updated.";
        }
    } else {
        header("location:viewBooks.php");
        exit();

    }
    ?>
</div>
</body>
</html>
