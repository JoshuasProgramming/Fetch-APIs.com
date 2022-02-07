<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header("Location:/website%204/adminLogin.html");
}

//Variable for the user's name
$user = $_SESSION['username'];

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
                <li><a href="covidApi.php">Covid Api Tracker</a></li>
                <li><a href="weatherApi.php">Weather Api</a></li>
                <li><a href="movieApi.php">Movie Api</a></li>
            </ul>

            <!--Right side of navigation bar-->
            <div class="right-side">
                <ul class="right-navbar">
                    <li><a href="userAccount.php">Account</a></li>
                    <li><a href="../includes/logoutUser.php">Logout</a></li>
                </ul>
            </div>
    </div>



    <?php 
    //When the user presses the submit button (to upload an image)
    if(isset($_POST['submit'])){
        //move_uploaded_file 
        
        //$hash = md5($_FILES['file']['name']); 
        $hash = uniqid();
        echo $hash;
        //move_uploaded_file($_FILES['file']['tmp_name'],'../images/'.$_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'],'../images/'.$hash.'.jpg');
        //$sql_image = "UPDATE users SET userImage = '".$_FILES['file']['name']."'WHERE username='$user'";
        $sql_image = "UPDATE users SET userImage = '".$hash. '.jpg'. "'WHERE username='$user'";
        $q = mysqli_query($conn, $sql_image);
    }
    ?>

    <section style="position:absolute; top:28%; left:10%;">
        <?php

        //Adding the default user profile image
        $sql = ("SELECT * FROM users WHERE username='$user'");

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){

            echo "<h2 style='font-size:25px;'>".$row['username'] . "</h2><br>";

            if($row['userImage'] == ""){
                echo"<img style='border-radius=50px;' width='300px' height='300px' src='../images/default.jpg'";
                $image = "default.jpg";
                $sql_update_image = mysqli_query($conn, "UPDATE users SET userImage='$image' WHERE username='$username'");
            } else {
                echo"<img width='300px' height='300px' src='../images/".$row['userImage']."'";
            }
        }
        ?>
    </section>


    <section>
        <!--Header text for the user's account name-->
        <h1 class="header-text2" style="font-size:80px; top:-50%; left:60%;"> <?php echo $_SESSION['username']?>'s Account </h1>
    
        <!--Update account button-->
        <button style="position:absolute; font-size:70px; top:-40%; left:45%;" id="user_update_btn">Update Account</button>

        <!--Delete User account-->
        <button style="position:absolute; font-size:72px; top:-15%; left:45%;" id="user_delete_btn">Delete Account</button>
    
        <form enctype="multipart/form-data" action="" method="post" style="position:absolute; top:5%; left:45%;">
            <input type="file" name="file" style="font-size:20px">
            <input type="submit" name="submit" style="font-size:21px"> 
        </form>
    </section>

    <script src="userScript.js"></script>
</body>
</html>