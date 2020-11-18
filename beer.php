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
    <link rel="stylesheet" href="style/styleBeer.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/beer.js"></script>
</head>

<body>
    <input type="button" value="&#8592;" class="back-button" onclick="goToTable()">
    <?php
    include "functions/connection.php";
    $sql = 'select * from pivo where naziv = "' . $_COOKIE["beerName"] . '"';
    if (!$q = $mysqli->query($sql)) {
        echo "Greska";
    }
    if ($q->num_rows == 0) {
        echo "Error 404: Beer not found";
    } else {
        while ($red = $q->fetch_object()) { ?>
            <h1 class="beer-info">Naziv: </h1>
            <t>
                <h1 class="beer-show"><?php echo $red->naziv;
                                        $_SESSION['beerName'] = $red->naziv ?></h1><br>
                <p class="beer-info">Zemlja porekla:</p>
                <p class="beer-show"><?php echo $red->zemlja_porekla; ?></p><br>
                <p class="beer-info">Procenat alkohola:</p>
                <p class="beer-show"><?php echo $red->proc_alk; ?> %</p><br>
                <p class="beer-info">Godina proizvodnje:</p>
                <p class="beer-show"><?php echo $red->god_proiz; ?></p><br>
                <p class="beer-info">Vrsta:</p>
                <p class="beer-show"><?php echo $red->vrsta; ?></p><br>
                <p class="beer-info">Ocena:</p>
                <p class="beer-show" id="rating">5</p><br>
                <input type="range" min="1" max="10" value="5" step="1" class="beer-range" id="slider" oninput="sliderChange(this.value)"><br>
                <input type="button" value="OCENI" class="button-rate" onclick="rateBeer()">
                <p id="test"></p>
        <?php }
    }
    $mysqli->close(); ?>
</body>

</html>