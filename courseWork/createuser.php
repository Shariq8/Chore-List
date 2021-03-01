<?php
require "database.php";
require "security.php";
session_start();
$fname = h($_POST['name']);
$email = h($_POST['email']);
$salt = sha1(time());
$password = h($_POST['password']);
$encrypted_password = sha1($salt.$password);
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//Registering details to the database
$db = new Database();
$register = $db->prepare("INSERT INTO USERS VALUES (NULL, :fname, :email, :salt, :encrypted_password)");
$register->bindValue(':fname', $fname, SQLITE3_TEXT);
$register->bindValue(':email', $email, SQLITE3_TEXT);
$register->bindValue(':salt', $salt, SQLITE3_TEXT);
$register->bindValue(':encrypted_password', $encrypted_password, SQLITE3_TEXT);
$results = $register->execute();

//Getting ID
$get_id = $db->prepare("SELECT ID FROM USERS WHERE email = :email");
$get_id->bindValue(':email', $email, SQLITE3_TEXT);
$result = $get_id->execute();
$_SESSION['id'] = $result->fetchArray(1)["ID"];

header("Location:index.php");
?>