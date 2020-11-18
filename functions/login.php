<?php
    if (isset($_POST["login"])) {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = strtolower(trim($_POST["username"]));
            $password = trim($_POST["password"]);

            include "functions/connection.php";
            $sql = "select korisnik_id, username, password from korisnik where username = '" . $username . "'";
            if (!$q = $mysqli->query($sql)) {
                echo "<script type = 'text/javascript'>alert('Greška pri logovanju.');</script>";
            }
            if ($q->num_rows == 0) {
                echo "<script type = 'text/javascript'>alert('Username ili šifra nisu ispravni.');</script>";
                exit();
            } else {
                while ($red = $q->fetch_object()) {
                    $pass = $red->password;
                }
            }

            if ($password === $pass) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
                header("LOCATION: menu.php");
            } else {
                echo "<script type = 'text/javascript'>alert('Username ili šifra nisu ispravni.');</script>";
            }
            $mysqli->close();

            unset($_POST['username']);
            unset($_POST['password']);
        } else {
            echo "<script type = 'text/javascript'>alert('Molim Vas unesite username i šifru.');</script>";
        }
        unset($_POST['login']);
    }
?>