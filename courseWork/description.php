<?php 
require "access.php";
require "database.php";
require "user.php";
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
loggedIn();
$id = $_SESSION['id'];
$user = new Username($id);
$descid = $_GET['id'];
$db = new Database();
$validID = $db->querySingle("SELECT * FROM CHORES WHERE ID = ".$descid);
if($validID['USER_ID'] != $id) header("Location:index.php");
?>

<!DOCTYPE html> 
<html lang="en">
    <head>
        <title>Description page</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
    </head>
    <body> 
        <div style = "text-align:center;" id="container">
            <h1>Description</h1>
            <?php
                $db = new Database();
                $desc = $db->querySingle("SELECT DESCRIPTION FROM CHORES WHERE ID = ".$descid);
                $html = $desc['DESCRIPTION'];
                echo $html;
            ?>
    </body>
</html>