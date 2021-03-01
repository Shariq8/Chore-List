$(document).ready( function(){
    $('.validation').submit( function(){
        $('#x').empty();
        fname = document.getElementById("name").value;
        email = document.getElementById("email").value;
        confemail = document.getElementById("confemail").value;
        pw = document.getElementById("password").value;
        cpw = document.getElementById("confirm_password").value;
    
        if(fname == null || fname == ""){
            console.log("This didn't work");
            $('#x').append("<p class = 'text'>Name must be filled in</p>");
            return false;
        }
        if(email == null ||  email == "" || email != confemail){
            $('#x').append("<p class = 'text'>Emails do not match</p>");
            return false;
        }
        if(pw != cpw || pw == null){
            $('#x').append("<p class = 'text'>Passwords do not match</p>");
            return false;
        }
    })
})