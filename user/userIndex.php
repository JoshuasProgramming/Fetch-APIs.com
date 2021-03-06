<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

//Checking if the user has a session. If they don't they'll be redirected
//to the admin login page
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header("Location:/website%204/login.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <!--Putting the user's name into the title of the page using the PHP session-->
    <title><?php echo $_SESSION['username']?>'s account</title>
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
                <li><a href="userWeatherApi.php">Weather Api</a></li>
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

    <!--Hero section with info and cta-->
    <section>
        <h3 class="header-text1">Your one way ticket for</h3>
        <h1 class="header-text2">FETCH API</h1>
        <h3 class="header-text3">Applications</h3>
        <button class="header-text-btn"><a href="covidApi.html">Lets Go!</a></button>
    </section>

    <!--Import of javascript file-->
    <script src="script.js"></script>
</body>
</html>