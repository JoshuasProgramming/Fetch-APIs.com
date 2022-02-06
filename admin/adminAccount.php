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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Admin Account Dashboard</title>
</head>
<body>
    <!--Navigation bar-->
    <div class="header">

            <!--Left side of navigation bar-->
            <div class="left-side">
                <a href="#">Fetch APIs.com</a>
            </div>

            <!--Middle of navigation bar-->
            <ul class="middle-navbar">
                <p href="#" style="font-size:50px; position:absolute; top:10%; left:44%;">Admin</p>
            </ul>

            <!--Right side of navigation bar-->
            <div class="right-side">
                <ul class="right-navbar">
                    <li><a href="adminAccount.php" class="active">Account</a></li>
                    <li><a href="../includes/logout.php">Logout</a></li>
                </ul>
            </div>
    </div>

    <!--Hero section with info and cta-->
    <section>
        <!--Header text for the admin-->
        <h1 class="header-text2" style="font-size:60px; top:20%; left:50%;">Admin Account</h1>
        
        <!--Smaller text for the admin's account name-->
        <h3 class="header-text2" style="font-size:81px; top:50%; border:3px solid black;" >Admin username: <?php echo $_SESSION['username']?></h3>
    
        <!--Update account button-->
        <button style="position:absolute; font-size:40px; top:70%; left:15%;" id="admin_update_btn">Update Account</button>

        <!--View Users button-->
        <button style="position:absolute; font-size:40px; top:70%; left:42%;" id="admin_view_users_btn">View Users</button>

        <!--Delete account button-->
        <button style="position:absolute; font-size:40px; top:70%; left:65%;" id="admin_delete_btn">Delete Account</button>
        
    </section>

    <script src="adminScript.js"></script>
</body>
<head>