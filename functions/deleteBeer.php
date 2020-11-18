<?php
session_start();
include "connection.php";

if (isset($_POST['beer'])) {
    $result = "";
    $beer = $_POST['beer'];
    $username = $_SESSION["username"];
    $sql_delete = "delete from ocena where korisnik_id in
     (select korisnik_id from korisnik where username = '{$username}') and pivo_id in (select pivo_id from pivo where naziv = '{$beer}')";
    if (!$q = $mysqli->query($sql_delete)) {
        // echo za gresku pri izvodjenju upita
        echo "Greska";
    }

    $sql = "select p.naziv, o.ocena from ocena o join korisnik k join pivo p where o.korisnik_id = k.korisnik_id
     and o.pivo_id = p.pivo_id and k.username = '{$username}' order by ocena desc";

    if (!$q = $mysqli->query($sql)) {
        // echo za gresku pri izvodjenju upita
        echo "Greska";
    }
    if ($q->num_rows == 0) {
        // ako nema nicega
        echo "Niste ocenili nijedno pivo";
    } else {
        $result .= "<thead>
            <th>NAZIV</th>
                <th>OCENA</th>
                <th>OBRIŠI</th>
        </thead>
        <tbody>";
        while ($red = $q->fetch_object()) {
            $result .= "<tr>
                    <td>" . $red->naziv . "</td>
                    <td>" . $red->ocena . "</td>
                    <td id='deleteBeer'>X</td>
                </tr>";
        }
        $result .= "</tbody>";  
    }
    echo $result;
}
