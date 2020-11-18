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
    <script type="text/javascript" src="javascript/archive.js"></script>
</head>

<body>
    <input type="button" value="&#8592;" class="back-button" onclick="window.location.href='menu.php'">
    <?php
    include "functions/connection.php";
    $sql = "select p.naziv, o.ocena from ocena o join korisnik k join pivo p where o.korisnik_id = k.korisnik_id
     and o.pivo_id = p.pivo_id and k.username = '{$_SESSION["username"]}' order by ocena desc";
    if (!$q = $mysqli->query($sql)) {
        echo "Greska sa bazom.";
    }
    if ($q->num_rows == 0) {
        echo "Niste ocenili nijedno pivo";
    } else {
    ?>
        <table id="beerTable">
            <thead>
                <th>NAZIV</th>
                <th>OCENA</th>
                <th>OBRIŠI</th>
            </thead>
            <tbody>
                <?php while ($red = $q->fetch_object()) { ?>
                    <tr>
                        <td><?php echo $red->naziv; ?></td>
                        <td><?php echo $red->ocena; ?></td>
                        <td id="deleteBeer">X</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }
    $mysqli->close(); ?>
</body>

</html>