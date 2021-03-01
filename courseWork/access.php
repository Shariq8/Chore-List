<?php
    function loggedIn(){
        if (!isset($_SESSION['id'])){
            header("location:login.php");
        }
    }

    function accessResource($resource_user_id){
        if($_SESSION['id'] != $resource_user_id){
            header("location:login.php");
        }
    }

?>