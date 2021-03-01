<?php 
session_start();
require "database.php";
require "security.php";
$email = h($_POST['email']);
$password = h($_POST['password']);

$db = new Database();
$user = $db->prepare("SELECT * FROM USERS WHERE EMAIL = :email");
$user->bindValue(':email', $email, SQLITE3_TEXT);
$result = $user->execute();
$arr = $result->fetchArray(1);

if($arr == NULL){
    header('Location:login.php');
}else{
    if(sha1($arr['SALT'] . $password) == $arr['PASSWORD']){
        $_SESSION['id'] = $arr['ID'];
        header('location:index.php');
    }else{
        header('location:login.php');
    }
}
?>