<?php
    require "config.php";

    $code = $_GET['code'];

    //Ügyfél
    $f_lekerd = "SELECT * FROM users WHERE code = '$code'";
    $f_talalt = $conn->query($f_lekerd);
    $felh = $f_talalt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Számla</title>

    <link rel="stylesheet" href="css/all-style.css">
    <link rel="stylesheet" href="css/szamla-style.css">
</head>
<body>
    <div class="adatok">
        <h1>Üdv, <?=$felh['vnev']." ".$felh['knev'] ?></h1>
        <h4>Kattints rá a kívánt számlaszámot tartalmazó kártyára, hogy megnézd az utalásí előzmányeket, és hogy tudj utalni.</h4>
    </div>
    <div class="vonal"></div>
    <div class="content">
        <?php
            //Számlaszám
            $sz_lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code'";
            $sz_talalt = $conn->query($sz_lekerd);
            while($szamla = $sz_talalt->fetch_assoc()){    
        ?>
            <div class="card">
                <div class="title">Számlaszám: <br><?= $szamla['szamlaszam']?></div>
                <div class="value">Összeg: <br><?=$szamla['osszeg']?> Ft</div>
            </div>
        <?php } ?>
    </div>
</body>
</html>