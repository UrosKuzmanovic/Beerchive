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
    <link rel="stylesheet" href="style/styleTable.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/table.js"></script>
</head>

<body>
    <input type="button" value="&#8592;" class="back-button" onclick="window.location.href='menu.php'">
    <input type="text" id="search" class="search-text" placeholder="Pretraži pivo po imenu" onkeyup="searchBeer(this.value)">
    <?php
    include "functions/connection.php";
    $sql = "select * from pivo";
    if (!$q = $mysqli->query($sql)) {
        echo "Greska pri izvodjenju upita";
    }
    if ($q->num_rows == 0) {
        echo "Nema podataka u tabeli";
    } else {
    ?>
        <table id="beerTable">
            <thead>
                <th>NAZIV</th>
                <th>ZEMLJA POREKLA</th>
                <th>% ALKOHOLA</th>
            </thead>
            <tbody>
                <?php while ($red = $q->fetch_object()) { ?>
                    <tr>
                        <td><?php echo $red->naziv; ?></td>
                        <td><?php echo $red->zemlja_porekla; ?></td>
                        <td><?php echo $red->proc_alk; ?> %</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }
    $mysqli->close(); ?>
</body>

</html>