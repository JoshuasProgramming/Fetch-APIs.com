<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

//Checking if the admin has a session. If they don't they'll be redirected
//to the admin login page
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header("Location:/website%204/adminLogin.html");
}

//Require the connection
require_once 'C:\xampp\htdocs\website 4\includes\connection.php';

//Making an SQL statement which will get every user, and order them by their unique id
$sql = "SELECT * FROM users ORDER BY id";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if(isset($_POST['delete'])){
    $key = $_POST['keyToDelete'];
    $check =("SELECT * FROM users WHERE id=$key") or die("not found".mysqli_error());
    if(($check) > 0){
        $deletesql = ("DELETE FROM users WHERE id=$key");
        $deleteResult = mysqli_query($conn, $deletesql);
    }
    header("location:adminIndex.php");
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>User Accounts</title>
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
                    <li><a href="adminAccount.php">Account</a></li>
                    <li><a href="../includes/logout.php">Logout</a></li>
                </ul>
            </div>
    </div>

    <!--Hero section with user information and cta-->
    <?php 
    echo"<table border=1 style='position:absolute; top:20%; left:17%; font-size:20px; border-collapse:collapse;'>
    <caption style='font-size:25px;'>User Account</caption>
    <thead>
        <th style='padding:10px 10px;'>ID</th>
        <th style='padding:10px 10px;'>username</th>
        <th style='padding:10px 10px;'>email</th>
        <th style='padding:10px 10px;'>password</th>
        <th style='padding:10px 10px;'>user Image</th>
        <th style='padding:10px 10px;'>select</th>
        <th style='padding:10px 10px;'>delete users</th>
    </thead>";
    while($row = mysqli_fetch_array($result)){
        echo"<tbody>";
            echo"<form action='adminIndex.php' method='post'>";
                echo"<td style='padding:10px 10px;'>". $row['id'] . "</td>";
                echo"<td style='padding:10px 10px;'>". $row['username'] . "</td>";
                echo"<td style='padding:10px 10px;'>". $row['email'] . "</td>";
                echo"<td style='padding:10px 10px;'>". $row['userPassword'] . "</td>";
                echo"<td style='padding:10px 10px;'>". $row['userImage'] . "</td>";
                echo"<td style='padding:10px 10px;'>
                        <input id='delete_checkbox' type='checkbox' name='keyToDelete' value='". $row['id'] . "'</td>";
                echo"<th style='padding:10px 10px;'><button style='height:30px; width:70px;' id='delete_user_btn' name='delete' value='delete'>delete</button></th>";
            echo"</form>";
        echo"</tbody>";
    }
    echo"</table>";

    ?>
    
    <!--Import of javascript file-->
    <script src="adminScript.js"></script>
</body>
</html>