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
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCekxGLAPxqxYXosPVe5fwTxKD_ru9Su5c&callback=map"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Covid Api</title>
</head>
<body>
    <!--Navigation bar-->
    <div class="header">

            <!--Left side of navigation bar-->
            <div class="left-side">
                <a href="index.html">Fetch APIs.com</a>
            </div>

            <!--Middle of navigation bar-->
            <ul class="middle-navbar">
                <li><a href="covidApi.html" class="active">Covid Api Tracker</a></li>
                <li><a href="weatherApi.html">Weather Api</a></li>
                <li><a href="movieApi.html">Movie Api</a></li>
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
    <input type="search" class="search-covid-api" id="search_covid_api" placeholder="Enter Country">

    <!--Select Covid Options-->
    <select class="select-covid-api" id="select_covid_api" disabled>
        <option value="select">Select</option>
        <option value="covid_deaths">Covid Deaths</option>
        <option value="covid_cases">Covid Cases</option>
        <option value="incident_rate">Incident Rate</option>
        <option value="mortality_rate">Mortality Rate</option>
    </select>

    <!--Container for output-->
    <div class="covid-api-output-container">
        <p class="output-text" id="output_text"></p>
        <div style="width:490px; height:490px;" class="google-map" id="map">

        </div>

        
    </div>
<!--Import of javascript file-->
<script src="../covid_api_script.js"></script>
</body>
</html>