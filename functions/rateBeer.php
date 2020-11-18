<?php
session_start();
if (isset($_POST['beerRate'])) {
    $beerName = $_COOKIE['beerName'];
    $beerRate = $_POST['beerRate'];
    $username = $_SESSION['username'];

    include "connection.php";

    $user = "select korisnik_id from korisnik where username = '{$username}'";
    $beer = "select pivo_id from pivo where naziv = '{$beerName}'";

    $sql_provera = "select * from ocena o join korisnik k join pivo p where o.korisnik_id = k.korisnik_id and o.pivo_id = p.pivo_id
         and k.username = '{$username}' and p.naziv = '{$beerName}'";

    if (!$q = $mysqli->query($sql_provera)) {
        echo "<script type = 'text/javascript'>alert('Greška sa bazom.');</script>";
    } else if ($q->num_rows == 0) {
        // insert
        $sql_insert = "insert into ocena values (({$user}), ({$beer}), {$beerRate})";
        if ($mysqli->query($sql_insert)) {
            echo "<script type = 'text/javascript'>alert('Pivo je ocenjeno!');</script>";
        } else {
            echo "<script type = 'text/javascript'>alert('Došlo je do greške.');</script>";
        }
    } else {
        // update
        $sql_update = "update ocena set ocena = {$beerRate} where korisnik_id = ({$user}) and pivo_id = ({$beer})";
        if ($mysqli->query($sql_update)) {
            echo "<script type = 'text/javascript'>alert('Pivo je ocenjeno!');</script>";
        } else {
            echo "<script type = 'text/javascript'>alert('Došlo je do greške.');</script>";
        }
    }
    $mysqli->close();
}
