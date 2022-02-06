<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header("Location:/website%204/adminLogin.html");
}

//Require the connection
require_once 'C:\xampp\htdocs\website 4\includes\connection.php';
?>

