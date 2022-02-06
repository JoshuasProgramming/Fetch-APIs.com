<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header("Location:/website%204/adminLogin.html");
}

$adminUsername = ($_SESSION['username']);

//Require the connection
require_once 'C:\xampp\htdocs\website 4\includes\connection.php';

//Update admin account
//Catch post data once the user presses the update button and process information
if(isset($_POST['update'])){
    $username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    //Checking if the password the user entered isn't the same as the new password
    if($current_password == $new_password){
        header("Location:/website%204/errorPages/CurrentEqualsNew.html");
    } 

    //check if the current password, new password and confirm new password are the same
    else if(($confirm_new_password == $current_password) && ($current_password == $new_password)){
        header("Location:/website%204/errorPages/confirmCurrentNewSame.html");
    }

    //check if the confirm new password is the same as the current password
    else if($confirm_new_password == $current_password){
        header("Location:/website%204/errorPages/confirmEqualsCurrentPassword.html");
    }

    //check if the new password is equal to the username
    else if($new_password == $username){
        header("Location:/website%204/errorPages/newEqualsUsername.html");
    }

    //check if the new password doesn't equal to the confirm new password
    else if($new_password !== $confirm_new_password){
        header("Location:/website%204/errorPages/newDoesntEqualConfirm.html");
    } 
    else{
        echo "worked";
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
    <title>Update Admin</title>
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

     <!--Register Form with username, email, password & confirm password-->
    <form action="" method="post" class="register-form">
        <input style="top:5%;" name ="username" placeholder="Username" class="register-username" id="register_username" value="<?php echo $adminUsername;?>" type="text" autocomplete="off" required>
        <input style="top:25%;" name="current_password" placeholder="Current Password" class="register-password" id="register_password" type="password" autocomplete="off" required>
        <input style="top:45%;" name="new_password" placeholder="New Password" class="register-confirm-password" id="register_confirm_password" type="password" autocomplete="off" required>
        <input name="confirm_new_password" placeholder="Confirm New Password" class="register-confirm-password" id="register_confirm_password" type="password" autocomplete="off" required>
        <button class="register-btn" name="update" type="submit">Update</button>

        <!--Show password checkbox that has functionality within the 'resgister.js' file-->
        <div class="show-password-container">
            <input type="checkbox" id="register_password_checkbox" class="register-password-checkbox">
            <label for="register_password_checkbox">Show Password</label>
        </div>
    </form>

    <!--'Register.js' file link-->
<script src="../register.js"></script>

</body>
</html>