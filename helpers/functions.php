<?php

    function isAdmin(){
        if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']){
            header('location:login.php');
        }
    }
  function isGuest(){
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']){
        header('location:index.php');
    }
  }

?>