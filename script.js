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

function toggle_confirmpassword(){
    if(state){
        document.getElementById("confirmpassword").setAttribute("type","password");
        document.getElementById("confirmpassword_show").innerHTML = "<i class='fa fa-eye-slash'></i>"
        state=false;
    }
    else {
        document.getElementById("confirmpassword").setAttribute("type","text");
        document.getElementById("confirmpassword_show").innerHTML = "<i class='fa fa-eye'></i>"
        state=true;
    }
}