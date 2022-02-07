<?php
//Get users session
//session_start() creates a session or resumes the current one based on a 
//session identifier passed via a GET or POST request, or passed via a cookie.
session_start();


session_destroy();
//unregister a session variable using the unset method with the session admin as a parameter
unset($_SESSION["username"]);

//Once the session has be disconnected/unregistered the admin is sent back to the adminLogin.html page.
header("Location:/website%204/adminLogin.html");
?>