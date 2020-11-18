<?php
    session_start();
    $_SESSION['loggedIn'] = false;
    $_SESSION['username'] = "";
    header("LOCATION: index.php");
?>
