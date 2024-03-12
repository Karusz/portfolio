<?php
    require "config.php";

    $code = $_GET['code'];

    //Ügyfél
    $f_lekerd = "SELECT * FROM users WHERE code = '$code'";
    $f_talalt = $conn->query($f_lekerd);
    $felh = $f_talalt->fetch_assoc();


    if(isset($_POST['cardoff-btn'])){
        $lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code'";
        $talalt = $conn->query($lekerd);
        $customer = $talalt->fetch_assoc();

        $lekerd = "SELECT * FROM cards WHERE szamlaszam = '$customer[szamlaszam]'";
        $talalt = $conn->query($lekerd);
        $card = $talalt->fetch_assoc();

        $conn->query("UPDATE cards SET is_active = 0 WHERE szamlaszam = '$card[szamlaszam]'");
    }
    
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
    <header>
        <ul class="navbar">
            <li><a href="atm.php?code=<?=$code?>">ATM</a></li>
        </ul>
    </header>
    <div class="adatok">
        <h1>Üdv, <?=$felh['vnev']." ".$felh['knev'] ?></h1>
        <h3>Pénz költése a hónapban:</h3>
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
                <a href="utalas.php">
                    <div class="title">Számlaszám: <br><?= $szamla['szamlaszam']?></div>
                    <div class="value">Összeg: <br><?=$szamla['osszeg']?> Ft</div>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="vonal"></div>
    <div class="adatok">
        <h2>Kártyák</h2>
    </div>
    <div class="content">
        
        <?php
            //Számlaszám
            $sz_lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code'";
            $sz_talalt = $conn->query($sz_lekerd);
            $szamla = $sz_talalt->fetch_assoc();

            //Bankkártya
            $c_lekerd = "SELECT * FROM cards WHERE szamlaszam = '$szamla[szamlaszam]'";
            $c_talalt = $conn->query($c_lekerd);
            while($card = $c_talalt->fetch_assoc()){
                if($card['is_active'] == 1){
                    echo '<div class="card">
                        <div class="title">Kártyaszám: <br>'.$card['kartyaszam'].'</div>
                        <div class="value">Lejárat: <br>'.$card['lejarat'].'</div>
                        <div class="value">CVC:'.$card['save_code'].'</div>
                        <div class="value"><form action="szamla.php?code='.$code.'" method="post"><button class="btn" name="cardoff-btn">Kártya letiltása</button></form></div>
                    </div>';
                }
            }
        ?>
        
    </div>
</body>
</html>