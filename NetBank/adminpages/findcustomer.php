<?php
    require "config.php";

    $keresett = $_GET['find'];
    $lekerd = "SELECT * FROM users WHERE azonosito LIKE '%$keresett%'";
    $talalt = $conn->query($lekerd);
    while ($ember = $talalt->fetch_assoc()) {
        echo '<h3><a href="szamla.php?code='.$ember['azonosito'].'">'.$ember['vnev'].' '.$ember['knev'].'</a></h3>';
    }

?>