var state = false;

function toggle_password(){
    if(state){
        document.getElementById("password").setAttribute("type","password");
        document.getElementById("password_show").innerHTML = "<i class='fa fa-eye-slash'></i>"
        state=false;
    }
    else {
        document.getElementById("password").setAttribute("type","text");
        document.getElementById("password_show").innerHTML = "<i class='fa fa-eye'></i>"
        state=true;
    }
}