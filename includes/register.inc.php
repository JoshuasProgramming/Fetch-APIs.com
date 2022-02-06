<?php
//require the database connection
require_once "connection.php";

//Checking if the user is trying to access this view pressing
//the 'submit' within './register.html'
if(isset($_POST["submit"])){
    //User is trying to register to website => create variables based on 
    //user information 
    //from the register form in ./register.html
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_passowrd = $_POST['confirm_password'];

    //Selecting all the email fields from the database
    //to then check if the user is trying to register using any
    //of them.
    $sql_email = "SELECT * FROM users WHERE email='$email'";
    $result_email = mysqli_query($conn, $sql_email);

    //Selecting all the username fields from the database
    //to then check if the user is trying to register using any
    //of them.
    $sql_username = "SELECT * FROM users WHERE username='$username'";
    $result_username = mysqli_query($conn, $sql_username);

    //Check if the password the user has inserted is the same as the 
    //'confirm_passowrd' input
    if($password == $confirm_passowrd){

        //check if username IS already is use 
        //(> 0 means that there is already a user with that username)
        if(mysqli_num_rows($result_username) > 0){
            //Send the user to a page, saying that "there is already a user with 
            //that username"
            header("Location:../errorPages/usernameTaken.html");
        }

        //check if email IS already is use 
        //(> 0 means that there is already a user with that email)
        if(mysqli_num_rows($result_email) > 0){
            //Send the user to a page, saying that 
            //"there is already a user with that email"
            header("Location:../errorPages/emailTaken.html");

        }
        //check if the email and username are already in use 
        //(> 0 means that there is already a user with that email username)
        if((mysqli_num_rows($result_username) > 0) && (mysqli_num_rows($result_email) > 0)){
            header("Location:../errorPages/usernameAndEmailTaken.html");
        }

        //check if email and username aren't already in use 
        //(== 0 means that there isn't a user with that username & emaill)
        if((mysqli_num_rows($result_email) == 0) && (mysqli_num_rows($result_username) == 0)) {

            $sql = "INSERT INTO users (username, email, userPassword) 
                VALUES ('$username', '$email', '$password')";

            if(mysqli_query($conn, $sql)){
                header("Location:../login.html");
            } else {
                echo "ERROR: Register data wasn't stored in the database table";
            }
        } 
    }
}
