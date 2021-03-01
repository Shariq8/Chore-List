<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-grid.css" type="text/css">
    </head>
    <body>
        <div class = "container" id = "container">
            <div>
                <h1>Login: </h1>
                <p>Please enter your Email Address and Password: </p>
            </div>
            <div>
                <form method='post' action='loginuser.php' accept-charset="utf-8">
                <input name="email" type = "email" value = "" placeholder="Email Address">
                <input name = "password" type="password" value = "" placeholder="password">
                <input type="submit" value ="Login"> 
                </form>  
            </div>
                <br>
                <a class = "text" href="register.php">Not registered? Click here</a>
         </div>
    </body>
</html>