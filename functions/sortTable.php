<?php
session_start();
include "connection.php";

if (isset($_POST['sort'])) {
    $result = "";
    $sortBy = $_POST['sort'];

    if ($sortBy == "NAZIV") {
        $sort = 'naziv';
    } else if ($sortBy == "ZEMLJA POREKLA") {
        $sort = 'zemlja_porekla';
    } else if ($sortBy == "% ALKOHOLA") {
        $sort = 'proc_alk';
    } else {
        $sort = '';
    }

    $sql = "select * from pivo order by {$sort}";
    if (!$q = $mysqli->query($sql)) {
        // echo za gresku pri izvodjenju upita
        echo "Greska";
    }
    if ($q->num_rows == 0) {
        // ako nema nicega
        echo "Nema podataka u tabeli";
    } else {
        $result = "<thead>
            <th>NAZIV</th>
            <th>ZEMLJA POREKLA</th>
            <th>% ALKOHOLA</th>
        </thead>
        <tbody>";
        while ($red = $q->fetch_object()) {
            $result .= "<tr>
                    <td>" . $red->naziv . "</td>
                    <td>" . $red->zemlja_porekla . "</td>
                    <td>" . $red->proc_alk . " %</td>
                </tr>";
        }
        $result .= "</tbody>";
        echo $result;
    }
}
