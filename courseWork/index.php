<?php 
require "access.php";
require "database.php";
require "user.php";
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
$id = $_SESSION['id'];
$user = new Username($id);
loggedIn();
?>

<!DOCTYPE html> 
<html lang="en">
    <head>
        <title>Index page</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css">
    </head>
    <body> 
        <div id="container">
            <div>
                <div class = "text">
                    <div class = "row">
                    <h1 class = "col-10" >Home Page</h1>
                    <a href = "logout.php" class = "col-2">LogOut</a>
                    <a href = "admin.php">Manage House Tasks</a>
                    <?php
                        echo "<h2>Hello ".$user->name()."!<br>";
                        echo "Today is " . date("Y/m/d") . "<br><br>";
                    ?>
                    <div  style = "text-align: center;"> <!-- Display the current list of chores to do -->
                        <h2>I know what you're going to do today:</h2>
                        <?php
                        $tasks = new Database();
                        $task_rows = $tasks->query("SELECT * FROM CHORES WHERE USER_ID = $id;");
                        $html = "<table class = 'row'>";
                        $html.= "<tr><td>Chore</td><td>Status</td></td></tr>";
                        while($row = $task_rows->fetchArray())
                        {
                            $html.="<tr><td class = 'col-3'><a href = 'description.php?id=".$row['ID']."'>".$row['CHORE']."</td><div class = 'col-6'></div><td class = 'col-3'><p style = 'background-color: #54abc8; color: white; padding: 7px 17px; margin: 4px 2px; display: inline-block; border-radius:30px; cursor: pointer;' class = 'button' id = 'buttonid'>Complete</p></td></tr>";
                        }
                        echo $html;
                        ?> 
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html> 
