<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

//Require the connection
require_once 'connection.php';

//isset checks if the variable 'submit' is set => outputs a true or false output. 
if(isset($_POST["submit"])){

    //making variables of the user's details + preventing sql injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['adminPassword']);

    //SELECT all information from the admin table and check if it's equal to the admin login input
    $sql_query = "SELECT * FROM admin WHERE username='$username' AND adminPassword='$password'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['username'] = $_POST['username'];
        //Send the admin to the admin index once they login successfully
        header("Location:/website%204/admin/adminIndex.php");

    //If the admin's login information doesn't work, they'll be given a "can't login" message/error.
    } else {
        //Send the admin to the page where they are presented with an the login error.
        header("Location:/website%204/errorPages/cantLoginAdmin.html");
    }
}