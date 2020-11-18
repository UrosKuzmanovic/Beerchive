<?php
require "functions/notLoggedIn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beerchive</title>
    <link rel="stylesheet" href="style/styleMenu.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function logout() {
            $.get("functions/logout.php");
        }
    </script>

</head>

<body>
    <h1>BEERCHIVE</h1>
    <ul>
        <a href="table.php">
            <li>Pregled piva</li>
        </a>
        <a href="form.php">
            <li>Unesi novo pivo</li>
        </a>
        <a href="archive.php">
            <li>Tvoja arhiva</li>
        </a>
        <!--<a href="#">
            <li>Statistika</li>
        </a>-->
        <a href="index.php" onclick="logout()">
            <li>Izloguj se</li>
        </a>
    </ul>
</body>

</html>