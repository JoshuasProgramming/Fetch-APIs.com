<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

//Checking if the userhas a session. If they don't they'll be redirected
//to the admin login page
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
    <!--Putting the user's name into the title of the page using the PHP session-->
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
        
        //Create a unique ID which will be assigned to a variable called '$hash'.
        //IMPORTANT => This unique ID prevents users from overridden someone elses image if they rename their image
        //to someone elses.
        $hash = uniqid();

        //Using the 'move_upload_file' method which takes to image file and temporary name of the file
        //The 'move_upload_file' method will then push the image to a specific location ('../images')
        //The image name has the unique ID ('$hash' variable), which will be assigned as a jpeg file.
        move_uploaded_file($_FILES['file']['tmp_name'],'../images/'.$hash.'.jpg');

        //Creating query for the SQL UPDATE
        //We're pushing the unique jpg name into the 'userImage' column in the 'users' table.
        $sql_image = "UPDATE users SET userImage = '".$hash. '.jpg'. "'WHERE username='$user'";
        $q = mysqli_query($conn, $sql_image);
    }
    ?>

    <section style="position:absolute; top:28%; left:10%;">
        <?php

        //Adding the default user profile image
        //Creating query for an SQL SELECT
        //We're grabbing all the users from the 'users' table, and selecting the current user.
        //The '$user' variable which was instantiated on lime 15 is used to grab the user, as that variable has
        //stored the user's session.
        $sql = ("SELECT * FROM users WHERE username='$user'");
        $result = mysqli_query($conn, $sql);

        //We're going to loop through x amount of users (it will always be 1) with that unique username.
        while($row = mysqli_fetch_assoc($result)){

            //We're going to output/echo the user's name above their profile image
            echo "<h2 style='font-size:25px;'>".$row['username'] . "</h2><br>";

            //Create a condition which asks if the user already has a profile image assigned the them 
            //within the database ('users' table => 'userImage' column).
            if($row['userImage'] == ""){

                //We're going to output/echo a default image as the user's profile (IF THEY HAVEN'T ALREADY GOT ONE).
                echo"<img style='border-radius=50px;' width='300px' height='300px' src='../images/default.jpg'";
                
                //Assign the 'default.jpg' image to a variable, which will then be used in the UPDATE SQL query.
                $image = "default.jpg";

                //Creating query for an SQL UPDATE
                //We're grabbing the user from the 'users' table, and updating their 'userImage' 
                //to the $image variable, within the database.
                $sql_update_image = mysqli_query($conn, "UPDATE users SET userImage='$image' WHERE username='$username'");
            
            //What happens if the user's image isn't assigned to them in the database.
            } else {
                
                //We're going to output/echo the user's profile (AS THEY ALREADY HAVE ONE IN THE DATABASE).
                echo"<img width='300px' height='300px' src='../images/".$row['userImage']."'";
            }
        }
        ?>
    </section>


    <section>
        <!--Header text for the user's account name-->
        <h1 class="header-text2" style="font-size:70px; top:-50%; left:60%;"> <?php echo $_SESSION['username']?>'s Account </h1>
    
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