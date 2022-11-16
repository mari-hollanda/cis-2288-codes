<?php
/*
 * Logout Page
 * Author: Donnie McKinnon and Marianna Hollanda
 * Date: 2021-12-09
 * Class: CIS2288
 * Description: Final Exam - Part 1
 */

session_start();

// check for logged in session
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    header("Location: login.php");
    exit;
} else {
    $userName = $_SESSION["username"];
    session_unset();

// Delete the session cookie.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

// Destroy the session
    if (session_destroy()) {
        header("Location: login.php?message=logout&userName=" . $userName);
        exit;
    }
}

