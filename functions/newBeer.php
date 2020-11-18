<?php if (isset($_POST["unesi"])) {
        if (trim($_POST['naziv']) != "" && trim($_POST['zemlja']) != "" && trim($_POST['procenat']) != "" && 
        trim($_POST['godina']) != "" && $_POST['vrsta'] != "") {
            $naziv = trim($_POST['naziv']);
            $zemlja = trim($_POST['zemlja']);
            $procenat = trim($_POST['procenat']);
            $godina = trim($_POST['godina']);
            $vrsta = $_POST['vrsta'];

            include "functions/connection.php";

            $sql = "insert into pivo (naziv, zemlja_porekla, proc_alk, god_proiz, vrsta)
             values ('{$naziv}', '{$zemlja}', {$procenat}, {$godina}, '{$vrsta}')";

            if ($mysqli->query($sql)) {
                echo "<script type = 'text/javascript'>alert('Uspešno ste uneli novo pivo!');</script>";
            } else {
                echo "<script type = 'text/javascript'>alert('Pivo već postoji u bazi.');</script>";
            }
            $mysqli->close();

            unset($_POST['naziv']);
            unset($_POST['zemlja']);
            unset($_POST['procenat']);
            unset($_POST['godina']);
            unset($_POST['vrsta']);
        } else {
            echo "<script type = 'text/javascript'>alert('Molim Vas unesite sve podatke o pivu.');</script>";
        }
        unset($_POST["unesi"]);
    }
?>