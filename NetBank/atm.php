<?php
    require "config.php";

    $code = $_GET['code'];

    //Számla
    $sz_lekerd = "SELECT * FROM szamlak WHERE user_azonosito = $code";
    $sz_talalt = $conn->query($sz_lekerd);
    $szamla = $sz_talalt->fetch_assoc();

    

    if(isset($_POST['felvetel-btn'])){
        $pin = $_POST['pin'];
        $kartya = $_POST['kartya'];
        $osszeg = $_POST['osszeg'];
        

        //Kártya
        $lekerd = "SELECT * FROM cards WHERE kartyaszam = '$kartya'";
        $talalt = $conn->query($lekerd);
        $card = $talalt->fetch_assoc();

        //Megadott pinkód jó-e
        if($pin == $card['PIN']){
            $lekerd = "SELECT * FROM szamlak WHERE szamlaszam = '$card[szamlaszam]'";
            $talalt = $conn->query($lekerd);
            $szamla = $talalt->fetch_assoc();
            
            if($szamla['osszeg'] >= $osszeg){
                $szamlan = $szamla['osszeg'];
                $szamlara = $szamlan-$osszeg;

                $ido = date("Y/m/d");


                $conn->query("UPDATE szamlak SET osszeg = $szamlara, tranzakcio= $osszeg, tranzakcio_ido = $ido WHERE szamlaszam = '$card[szamlaszam]'");
            }else{
                echo '<script>alert("Nincs elég fedezet a kártyán!")</script>';
            }

        }else{
            echo '<script>alert("Nem jó a pinkód!")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/all-style.css">
</head>
<body>
    <header>
        <ul class="navbar">
            <li><a href="szamla.php?code=<?=$code?>">Számla</a></li>
        </ul>
    </header>
        
    <div>
        <form action="atm.php?code=<?=$code?>" method="post">
            <?php
                //Kártya
                $c_lekerd = "SELECT * FROM cards WHERE szamlaszam = '$szamla[szamlaszam]'";
                $c_talalt = $conn->query($c_lekerd);
                while($card = $c_talalt->fetch_assoc()){
            ?>
                <select name="kartya">
                    <option value="<?=$card['kartyaszam']?>"><?=$card['kartyaszam']?></option>
                </select>
            <?php } ?>

            <input type="password" name="pin" placeholder="PIN">
            <input type="text" name="osszeg" placeholder="Összeg">
            <button class="btn" name="felvetel-btn">Pénz felvétele</button>
        </form>
    </div>
</body>
</html>