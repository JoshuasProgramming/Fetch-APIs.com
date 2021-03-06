<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Movie Api</title>
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
                <li><a href="userMovieApi.php" class="active">Movie Api</a></li>
            </ul>

            <!--Right side of navigation bar-->
            <div class="right-side">
                <ul class="right-navbar">
                    <li><a href="userAccount.php">Account</a></li>
                    <li><a href="../includes/logoutUser.php">logout</a></li>
                </ul>
            </div>
    </div>

    <!--Button that'll generate the random movie-->
    <button class="random-movie-btn" id="random_movie_btn">Generate Random movie</button>
    
    <!--Random movie image will load up here-->
    <img src="" alt="" id="image1" class="movie-image-output">

    <!--Random movie title will load up here-->
    <p id="movie_image_title" class="movie_image_title"></p>

    <!--Linking the movie api script-->
    <script src="../movie_api_script.js"></script>
</body>
</html>