//Grab the password input area/element
const register_password = document.getElementById('register_password');
//Grab the confirm password input area/element
const register_confirm_password = document.getElementById('register_confirm_password');

//Grab the register password checkbox and add an event listener, 
//so that once the user clicks, it will reveal/unreveal the password
const register_password_checkbox = document.getElementById('register_password_checkbox').addEventListener("click",(e)=>{
    
    //Checking if the register password input is of type 'password' or 'text'
    if(register_password.type == "password"){
        register_password.type = "text";
    } else if(register_password.type == "text"){
        register_password.type = "password";
    }

    //Checking if the register confirm password input is of type 'password' or 'text'
    if(register_confirm_password.type == "password"){
        register_confirm_password.type = "text";
    } else if(register_confirm_password.type == "text"){
        register_confirm_password.type = "password";
    }
});
