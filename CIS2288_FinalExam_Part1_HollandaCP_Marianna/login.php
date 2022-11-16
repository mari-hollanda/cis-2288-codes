<?php
/*
 * Login Page
 * Author: Donnie McKinnon and Marianna Hollanda
 * Date: 2021-12-09
 * Class: CIS2288
 * Description: Final Exam - Part 1
 */
require_once("pageHead.php");
session_start();
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    header("location:index.php");
    exit;
}
if (!isset($_POST['submit'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIS-2288 Topic 6 Class 3 - Authentication</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function error() {
            //document.getElementById("error").color = "blue";
            document.getElementById("error").style.display = "inline";
            //alert(document.getElementById("error").display="none");
        }
    </script>
</head>
<body>
<div class="login-form">
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
        <h2 class="text-center">Log in</h2>
        <?php if (isset($_GET["message"])) {
            if ($_GET["message"] == "loginError") {
                echo '<p id="error" style="color: red;">Invalid Login</p>';
            } else if ($_GET["message"] == "logout") {
                echo '<p id="error" style="color: blue;">Goodbye ' . $_GET["userName"] . '</p>';
            } else if ($_GET["message"] == "notLoggedIn") {
                echo '<p id="error" style="color: blue;">You must login</p>';
            }
        }
        ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>

    </form>

</div>
</body>
    </html>
    <?php
} else {
    include("lib/config.php");

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    // SHA1() calculates a SHA-1 160-bit checksum for the string
    //One of the possible uses for this function is as a hash key.
    //source - https://dev.mysql.com/doc/refman/8.0/en/encryption-functions.html#function_sha1
    $query = "SELECT custUser FROM external_users WHERE BINARY custUser='" . $username . "' AND custPass=sha1('" . $password . "')";

    $result = $mysqli->query($query);
    if ($result = $mysqli->query($query)) {
        // If result matched $username and $password, table row must be 1 row
        if ($result->num_rows == 1) {
            // Register $username, $password and redirect to file "index.php"
            $_SESSION["username"] = $username;
            // set a session variable that is checked for at the beginning of any of your secure .php pages
            $_SESSION["loggedIn"] = true;
            header("location:index.php");
        } else {
            $location = $_SERVER['PHP_SELF'] . "?message=loginError";
            header("Location:" . $location);
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
}

