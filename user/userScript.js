const user_update_btn = document.getElementById('user_update_btn').addEventListener("click", (e)=>{
    window.location.href = "http://localhost/website%204/user/userUpdate.php";
});

const user_delete_btn = document.getElementById('user_delete_btn').addEventListener("click", (e)=>{
    
    let options = prompt("Are You Sure (Yes/No)");

    if(options == "Yes"){
        alert("user account deleted");
        window.location.href = "http://localhost/website%204/user/userDelete.php";
        return;
    }

    //If admin entered "No"...
    if(options == "No"){
        return;
    }

    //If admin entered something other than "Yes" or "NO"...
    if((options !== "Yes") || (options !== "No")){
        alert("Didn't work, Try Again");
        return;
    }
});

