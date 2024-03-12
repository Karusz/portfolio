<?php
    require "../config.php";

    $lekerd = "SELECT * FROM users";
    $talalt = $conn->query($lekerd);
    $customer = $talalt->fetch_assoc();

    echo $customer['code'][0],$customer['code'][1], "<br>";


    $year = date("Y")+10;
    $mon = date("m");
    $lejarat = $year."/".$mon;
    echo $lejarat; 

?>