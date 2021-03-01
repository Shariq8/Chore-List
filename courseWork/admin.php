<!--
    This page is where you're allowed to add chores to people
    Current problems at hand:
        - Prompt for secure password, if known by the user they can view the admin page (use javaScript later)
-->
<?php 
include "access.php";
include "database.php";
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <title>Admin page</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css">
        <script src = "js/jquery-3.5.1.min.js"></script>
        <script src = "js/addingChore.js"></script>
    </head>
    <body>
        <div class = "row">
            <div id = "container" class = "col-5">
                <div class = "text">
                    <h1>Admin Page </h1>  
                    <h2>List of residences:</h2>
                </div>
                <?php
                    $listing = new Database();
                    $listing_rows = $listing->query("SELECT * FROM USERS");
                    printf("<div class = 'table'>");
                    printf("<form><table>");
                    while ( ($row = $listing_rows->fetchArray() )){
                        printf("<tr><td id = 'name' class = 'name'>".$row['NAME']."</td></tr>");
                    }
                    printf("</table></form></div>");
                ?>
            </div>
            <div id = "container" class = "col-5">
                <h2 class ="text">Add a task</h2>
                <div>   
                    <form class = "choreAdd" action = "addChore.php" method = "post" accept-charset = "utf-8">
                        <select id = "frequency" class = "input" name="frequency">
                                <option value="Every Day">Every Day</option>
                                <option value="Every Week">Every Week</option>
                                <option value="Every Fortnight">Every Fortnight</option>
                                <option value="One Time">One Time</option>
                        </select>
                        <div style = "justify-content: center; font-family: 'Raleway', sans-serif;" class = "row">
                            <input class = "col-1" type = "radio" id = "difficulty" name = "difficulty" value = "1">1</input>
                            <input class = "col-1" type = "radio" id = "difficulty" name = "difficulty" value = "2">2</input>
                            <input class = "col-1" type = "radio" id = "difficulty" name = "difficulty" value = "3">3</input>
                            <input class = "col-1" type = "radio" id = "difficulty" name = "difficulty" value = "4">4</input>
                            <input class = "col-1" type = "radio" id = "difficulty" name = "difficulty" value = "5">5</input>
                        </div>
                        <input name = "chore" value = "" id = "chore" placeholder = "Name of Chore">
                        <label for="description"></label><br>
                        <textarea class = "input" cols="16" rows="5" name='description' id = "description" placeholder = "Description"></textarea><br>
                        <input class = "input" type = "submit" value = "Add">
                    </form>
                </div>
            </div>
        </div>
        <div id = "x">
        </div>
    </body>
</html>