<?php
    require "config.php";

    $keresett = $_GET['find'];
    $code = $_GET['code'];
    $lekerd = "SELECT * FROM szamlak WHERE szamlaszam LIKE '%$keresett%' AND NOT user_azonosito = '$code'";
    $talalt = $conn->query($lekerd);
    while ($szamla = $talalt->fetch_assoc()) {
        echo '<option value="'.$szamla['szamlaszam'].'">'.$szamla['szamlaszam'].'</option>';
    }

?>