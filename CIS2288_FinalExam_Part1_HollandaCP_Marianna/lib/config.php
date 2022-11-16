<?php
/*
 * Connect to Database
 * Author: Marianna Hollanda
 * Date: 2021-12-09
 * Class: CIS2288
 * Description: Final Exam - Part 1
 */

//db connect script here user is root pass is empty
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'books');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}