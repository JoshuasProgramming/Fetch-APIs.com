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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Search Results</title>
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

    <button id="adminSearch" style="position:absolute; top:20%; left:45%; font-size:40px;">Back</button>
    <script src="adminSearch.js"></script>
    
    <?php
    //Search bar below
    if(isset($_POST['findUser'])){
        $user = $_POST['findUser'];
        $query_string = ("SELECT * FROM users WHERE username LIKE '$user'");
        
        $query = mysqli_query($conn, $query_string);
        $result_count = mysqli_num_rows($query);

        if($result_count > 0){
            while($results = mysqli_fetch_array($query)){
                if($results['userImage'] !== ""){
                    //if the user has a profile image
                    echo "<h3 style='position:absolute; top:35%; left:45%; font-size:90px;'>ID: ".$results['id']."</h3>";
                    echo "<h3 style='position:absolute; top:50%; left:45%; font-size:90px;'>Username: ".$results['username']."</h3>";
                    echo "<h3 style='position:absolute; top:65%; left:45%; font-size:90px;'>Email: ".$results['email']."</h3>";
                    echo "<img style='position:absolute; text-align:center; top:38%; left:15%;' width='280px' height='280px' src='../images/".$results['userImage']."'";
                } else if($results['userImage'] == ""){

                    echo "<h3 style='position:absolute; top:35%; left:45%; font-size:90px;'>ID: ".$results['id']."</h3>";
                    echo "<h3 style='position:absolute; top:50%; left:45%; font-size:90px;'>Username: ".$results['username']."</h3>";
                    echo "<h3 style='position:absolute; top:65%; left:45%; font-size:90px;'>Email: ".$results['email']."</h3>";
                    echo "<img style='position:absolute; text-align:center; top:38%; left:15%;' width='280px' height='280px' src='../images/default.jpg'";
                }
            }
        }

        else if($result_count > 1){
            echo ("$result_count users found");
            return;
        }
        else{
            header("Location:../errorPages/userNotFound.html");
            return;
        }

    }
    ?>
});
    
</body>
</html>