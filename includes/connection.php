<?php

/**
 * Grabbing the servername, username, password and dbname
 * 1.servername is ALWAYS "localhost"
 * 2.username is ALWAYS "root"
 * 3.password is ALWAYS "" => empty
 * 4.dbname depends on what you called it within the db (database) in PhpMyAdmin
 */
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "fetchapis.com";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "connected successfully";

