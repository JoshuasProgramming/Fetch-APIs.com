<?php
//Get users session
//session_start() creates a session or resumes the current one based on a 
//session identifier passed via a GET or POST request, or passed via a cookie.
session_start();

//include the database connection
require_once 'C:\xampp\htdocs\website 4\includes\connection.php';

//Create variable for the username
$username = ($_SESSION['username']);

//sql query for deleting the a particular user from the 'admin' table in PHPMyAdmin
$sql_query = ("DELETE FROM users WHERE username='$username'");
$result = mysqli_query($conn, $sql_query);

//If the sql query happens, the admin has been deleted and is sent back to logout.php file
//The logout.php file will close the session and send them to the login.html page
if($sql_query){
    header("Location:../includes\logoutUser.php");
} else {
    //If the above doesn't work I've put a mysql_error with the database connection sql 
    //variable as a parameter
    mysql_error($conn);
}
?>