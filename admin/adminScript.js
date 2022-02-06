const admin_view_users_btn = document.getElementById('admin_view_users_btn').addEventListener("click", (e)=>{
    window.location.href = "http://localhost/website%204/admin/adminIndex.php";
});

const admin_update_btn = document.getElementById('admin_update_btn').addEventListener("click", (e)=>{
    window.location.href = "http://localhost/website%204/admin/adminUpdate.php";
});

const admin_delete_btn = document.getElementById('admin_delete_btn').addEventListener("click", (e)=>{
    let options = prompt("Are You Sure (Yes/No)");

    if(options == "Yes"){
        window.location.href = "http://localhost/website%204/admin/delete.php";
    }

    //If user entered "No"...
    if(options == "No"){
        return;
    }

    //If user entered something other than "Yes" or "NO"...
    else{
        alert("Didn't work, Try Again");
        return;
    }
});
