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
    <link rel="stylesheet" href="style/styleForm.css">
</head>

<body>
    <input type="button" value="&#8592;" class="back-button" onclick="window.location.href='menu.php'">
    <form action="" method="post">
        <p>Naziv:</p><input type="text" class="input-new" name="naziv">
        <p>Zemlja porekla:</p><input type="text" class="input-new" name="zemlja">
        <p>% alkohola:</p><input type="text" class="input-new" name="procenat">
        <p>Godina proizvodnje:</p><input type="text" class="input-new" name="godina">
        <p>Vrsta:</p><select name="vrsta">
            <option>Svetlo</option>
            <option>Tamno</option>
            <option>Crveno</option>
            <option>Psenicno</option>
        </select><br>
        <input type="submit" value="UNESI NOVO PIVO" class="button-new" name="unesi">
    </form>

    <?php
    include "functions/newBeer.php";
    ?>

</body>

</html>