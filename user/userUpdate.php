<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header("Location:/website%204/login.html");
}

//Variable for the user's name
$user = $_SESSION['username'];

//Require the connection
require_once 'C:\xampp\htdocs\website 4\includes\connection.php';

//Update admin account
//Catch post data once the user presses the update button and process information
if(isset($_POST['update'])){
    $username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    //check if the current password, new password and confirm new password are the same (DONE!)
    if(($confirm_new_password == $current_password) && ($current_password == $new_password)){
        header("Location:/website%204/errorPagesUser/confirmCurrentNewSame.html");
    }

    //Checking if the password the user entered isn't the same as the new password (DONE!)
    else if($current_password == $new_password){
        header("Location:/website%204/errorPagesUser/CurrentEqualsNew.html");
    } 

    //check if the confirm new password is the same as the current password(DONE!)
    else if($confirm_new_password == $current_password){
        header("Location:/website%204/errorPagesUser/confirmEqualsCurrentPassword.html");
    }

    //check if the new password is equal to the username (DONE!)
    else if($new_password == $username){
        header("Location:/website%204/errorPagesUser/newEqualsUsername.html");
    }

    //check if the new password doesn't equal to the confirm new password (DONE!)
    else if($new_password !== $confirm_new_password){
        header("Location:/website%204/errorPagesUser/newDoesntEqualConfirm.html");
    } 
    else{
        $sql_update_user = ("UPDATE users SET userPassword='$new_password' WHERE username='$username' AND userPassword='$current_password'");

        //2.create mysqli_query with the database connection and the sql UPDATE query
        $sql_update_result = mysqli_query($conn, $sql_update_user);

        //Create failure message
        if(!$sql_update_user){
            die("Failed to update database. Check query string.");
        }
        else if($sql_update_user){
            header("Location:/website%204/successPages/userUpdated.html");
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?php echo $_SESSION['username']?>'s' Dashboard</title>
</head>
<body>
    <!--Navigation bar-->
    <div class="header">

            <!--Left side of navigation bar-->
            <div class="left-side">
                <a href="userIndex.php">Fetch APIs.com</a>
            </div>

            <!--Middle of navigation bar-->
            <ul class="middle-navbar">
                <li><a href="userCovidApi.php">Covid Api Tracker</a></li>
                <li><a href="userWeatherApi.php" class="active">Weather Api</a></li>
                <li><a href="userMovieApi.php">Movie Api</a></li>
            </ul>

            <!--Right side of navigation bar-->
            <div class="right-side">
                <ul class="right-navbar">
                    <li><a href="userAccount.php">Account</a></li>
                    <li><a href="../includes/logoutUser.php">logout</a></li>
                </ul>
            </div>
    </div>

    <!--Register Form with username, email, password & confirm password-->
    <form action="" method="post" class="register-form">
            <input style="top:5%;" name ="username" placeholder="Username" class="register-username" id="register_username" value="<?php echo $_SESSION['username'];?>" type="text" autocomplete="off" required>
            <input style="top:25%;" name="current_password" placeholder="Current Password" class="register-password" id="register_password" type="password" autocomplete="off" required>
            <input style="top:45%;" name="new_password" placeholder="New Password" class="register-confirm-password" id="register_confirm_password" type="password" autocomplete="off" required>
            <input name="confirm_new_password" placeholder="Confirm New Password" class="register-confirm-password" id="register_confirm_password" type="password" autocomplete="off" required>
            <button class="register-btn" name="update" type="submit">Update</button>

            <!--Show password checkbox that has functionality within the 'register.js' file-->
            <div class="show-password-container">
                <input type="checkbox" id="register_password_checkbox" class="register-password-checkbox">
                <label for="register_password_checkbox">Show Password</label>
            </div>
    </form>
<body>
</html>