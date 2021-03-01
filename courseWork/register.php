<!DOCTYPE html>
<html>
<head> 
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css">
    <script src='js/jquery-3.5.1.min.js'></script>
    <script src='js/registration.js'></script>
</head>
<body>
<div class = "container" id = "container">
<div class = "text">
<h1>Welcome to the Chorinator(inator...inator)</h1>
<h2>Please enter your details to get started:</h2>
</div>
<form method = "post" action = "createuser.php" accept-charset="utf-8" class = "validation">
    <input id = "name" name = "name" placeholder = "Name"><br>
    <input id = "email" name = "email" type = "email" placeholder = "Email Address"> <br>
    <input id = "confemail" name = "confemail" type = "email" placeholder = "Confirm Email Address">
    <input id = "password" name = "password" type="password" placeholder="Password"> <br>
    <input id = "confirm_password" name = "confirm_password" type="password" placeholder="Confirm Password"> <br>
    <input type="submit" value ="Register!">
</form>
<div id = "x">
</div>
</div>

</body>
</html>