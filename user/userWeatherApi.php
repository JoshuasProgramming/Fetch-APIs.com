<?php

//Create session
session_start();

//prevents the undefined array key ERROR
error_reporting(0);

//Checking if the user has a session. If they don't they'll be redirected
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
    <title>Weather Api</title>
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

    <!--Search bar-->
    <input placeholder="enter location" type="search" id="country_weather" class="search-weather-api">
    
    <!--Select Weather Options-->
    <select class="select-weather-api" id="select_weather_api" disabled>
        <option value="select">Select</option>
        <option value="Temperature(f)">Temperature(f)</option>
        <option value="Temperature(c)">Temperature(c)</option>
        <option value="wind (mph)">wind (mph)</option>
        <option value="wind (kph)">wind (kph)</option>
        <option value="humidity">humidity</option>
        <option value="uv">uv</option>
        <option value="Condition">Condition</option>
        <option value="Last Updated">Last Updated</option>
    </select>

    <!--Container for output-->
    <div class="weather-api-output-container">
        <p class="output-weather-text" id="output_text"></p>
    </div>
    
    <script src="weather_api_script.js"></script>
</body>
</html>