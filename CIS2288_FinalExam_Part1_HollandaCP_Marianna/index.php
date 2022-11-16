<?php
/*
 * Index Page
 * Author: Donnie McKinnon and Marianna Hollanda
 * Date: 2021-12-09
 * Class: CIS2288
 * Description: Final Exam - Part 1
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book-O-Rama Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <?php
    session_start();
    require("lib/config.php");
    //Sorting
    if (isset($_GET['sort'])) {
        if ($_GET['sort'] == 'id') {
            $sort = " order by books.id asc";
        } else if ($_GET['sort'] == 'isbn') {
            $sort = " order by books.isbn asc";
        } else if ($_GET['sort'] == 'author') {
            $sort = " order by books.author asc";
        } else if ($_GET['sort'] == 'title') {
            $sort = " order by books.title asc";
        } else if ($_GET['sort'] == 'price') {
            $sort = " order by books.price asc";
        }
    } else {
        $sort = " order by books.title asc";
    }
    if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
        require_once('pageHead.php');
        //Display book inventory
        $query = "SELECT id,isbn,author,title,price FROM books".$sort;

        // Here we use our $db object created above and run the query() method. We pass it our query from above.
        $result = $mysqli->query($query);

        $num_results = $result->num_rows;
        if (isset($_GET['msg'])) {
            echo "<p>{$_GET['msg']}</p>";
        }
        echo "<p>Number of books found: " . $num_results . "</p>";
        echo "<h2>CIS Book Inventory</h2>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        if ($num_results > 0) {
            $books = $result->fetch_all(MYSQLI_ASSOC);
            echo "<table class='table table-bordered'><tr>";
            //This dynamically retieves header names
            foreach ($books[0] as $k => $v) {
                echo "<th><a href='?sort=" . $k . "'>" . $k . "</a></th>";
            }
            echo "</tr></thead>";
            echo "<tbody>";
            //Create a new row for each book
            foreach ($books as $book) {
                echo "<tr>";
                $i = 0;
                foreach ($book as $k => $v) {
                    if ($k == 'id') {
                        echo "<td>" . $v . "</td>";
                        $bookId = $v;
                    } else {
                        echo "<td>" . $v . "</td>";
                    }
                    $i++;
                }
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        // free result and disconnect
        $result->free();
        $mysqli->close();
    } else if (($_SESSION['loggedIn']) || $_SESSION['loggedIn']) {
        require_once('pageHead.php');
        $userName = $_SESSION["username"];
        //Display book inventory
        $query = "SELECT id,isbn,author,title,price FROM books" . $sort;
        // Here we use our $db object created above and run the query() method. We pass it our query from above.
        $result = $mysqli->query($query);
        $num_results = $result->num_rows;

        if (isset($_GET['msg'])) {
            echo "<p>{$_GET['msg']}</p>";
        }

        echo "<p>Number of books found: " . $num_results . "</p>";
        echo "<h2>CIS Book Inventory - Welcome " . $userName . "</h2>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";

        if ($num_results > 0) {
            $books = $result->fetch_all(MYSQLI_ASSOC);
            echo "<table class='table table-bordered'><tr>";
            //This dynamically retieves header names
            foreach ($books[0] as $k => $v) {
                echo "<th><a href='?sort=" . $k . "'>" . $k . "</a></th>";
            }
            echo "<th>Action</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            //Create a new row for each book
            foreach ($books as $book) {
                echo "<tr>";
                $i = 0;
                foreach ($book as $k => $v) {
                    if ($k == 'id') {
                        echo "<td>" . $v . "</td>";
                        $bookId = $v;
                    } else {
                        echo "<td>" . $v . "</td>";
                    }
                    //show to delete and edit option if logged in
                    if (($i == count($book) - 1)) {
                        echo "<td>";
                        echo "<div class='btn-toolbar'>";
                        echo "<a href='editBook.php?bookId=" . $bookId . "' title='Edit Record' class='btn btn-info btn-xs' data-toggle='tooltip'>Edit</a>";
                        echo "<a href='deleteBook.php?bookId=" . $bookId . "' title='Delete Record' class='btn btn-info btn-xs' data-toggle='tooltip'>Delete</a>";
                        echo "</div>";
                        echo "</td>";
                    }
                    $i++;
                }
                echo "</tr>";
            }
            echo "<tr><td colspan='6'>";
            echo "<a href='newBook.php' title='View Record' class='btn btn-info' data-toggle='tooltip'>Add a New Book</a>";
            echo "</td></tr>";
            echo "</tbody>";
            echo "</table>";
        }
        // free result and disconnect
        $result->free();
        $mysqli->close();
    }
    ?>
</div>
</body>
</html>
