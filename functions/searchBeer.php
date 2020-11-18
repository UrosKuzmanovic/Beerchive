<?php
session_start();
include "connection.php";

if (isset($_POST['name'])) {
    $result = "";
    $search = $_POST['name'];
    $sql = "select * from pivo where lower(naziv) like lower('%{$search}%')";
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
