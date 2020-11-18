<?php
    if (isset($_POST["register"])) {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['rpassword'])) {
            $username = strtolower(trim($_POST['username']));
            $password = trim($_POST['password']);
            $rpassword = trim($_POST['rpassword']);

            if ($password === $rpassword) {
                include "functions/connection.php";
                $sql = "insert into korisnik (username, password) values ('{$username}', '{$password}')";
                if ($mysqli->query($sql)) {
                    echo "<script type = 'text/javascript'>alert('Uspešno registrovan');</script>";
                    $_SESSION['loggedIn'] = true;
                    header("LOCATION: menu.php");
                } else {
                    echo "<script type = 'text/javascript'>alert('Greška pri registrovanju.');</script>";
                }
                $mysqli->close();
            } else {
                echo "<script type = 'text/javascript'>alert('Šifre se ne poklapaju');</script>"; // srediti
            }
            unset($_POST['username']);
            unset($_POST['password']);
            unset($_POST['rpassword']);
        } else {
            echo "<script type = 'text/javascript'>alert('Molim Vas unesite username i šifru');</script>"; // srediti
        }
        unset($_POST['register']);
    }
?>