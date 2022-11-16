<?php
// check for logged in session
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'])
{
    // user is not logged in
    // re-direct user to login_old.php
    header("Location: login.php?message=notLoggedIn");
    exit;
}