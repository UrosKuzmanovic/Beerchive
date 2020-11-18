<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false;
}
if($_SESSION['loggedIn']){
    header("LOCATION: menu.php");
}
?>