//Grab login password element
const login_password = document.getElementById('login_password');

//Grab login password checkbox and add an event listener for when the user clicks it
const login_password_checkbox = document.getElementById('login_password_checkbox').addEventListener("click", (e)=>{

    //Checking if the login password input is of type 'password' or 'text'
    if(login_password.type == "password"){
        login_password.type = "text";
    } else if(login_password.type == "text"){
        login_password.type ="password";
    }
});