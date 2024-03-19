<?php
    require "config.php";

    
    $errol = $_GET['szamlaszam'];
    $code = $_GET['code'];

    //Számlaszám keresése
    $alap_lekerd = "SELECT * FROM szamlak WHERE szamlaszam = '$errol'";
    $alap_talalt = $conn->query($alap_lekerd);
    $alap_szamla = $alap_talalt->fetch_assoc();
    
    //Felhasználó keresése
    $customer_lekerd = "SELECT * FROM users WHERE code = '$code'";
    $customer_talalt = $conn->query($customer_lekerd);
    $customer = $customer_talalt->fetch_assoc(); 

    if(isset($_POST['sajatutalas-btn'])){
        $erre = $_POST['utalas_szamla'];
        $ertek = $_POST['ertek'];
        $alap_szamla_osszeg = $alap_szamla['osszeg'];

        //Kivonja a megnyitott számlaszámról az összeget és 

        $kivont_osszeg = $alap_szamla_osszeg - $ertek;
        if($kivont_osszeg >= 0){
            $tranzakcio = $alap_szamla['tranzakcio'] + $ertek;
            $conn->query("UPDATE szamlak SET osszeg = $kivont_osszeg, tranzakcio = $tranzakcio WHERE szamlaszam = '$errol'");

            //Jóváírás a másik számlára
            $erre_lekerd = "SELECT * FROM szamlak WHERE szamlaszam = '$erre'";
            $erre_talalt = $conn->query($erre_lekerd);
            $erre_szamla = $erre_talalt->fetch_assoc();
            $erre_osszeg = $erre_szamla['osszeg'];
            $hozzaadott_osszeg = $erre_osszeg + $ertek;
            $conn->query("UPDATE szamlak SET osszeg = $hozzaadott_osszeg WHERE szamlaszam = '$erre_szamla[szamlaszam]'"); 
        }else{
            echo '<script>alert("Nincs elég fedezet a kártyán!")</script>';
        }
        

        
    }

    if(isset($_POST['masutalas-btn'])){
        $masiknak_szamla = $_POST['mas_szamla'];
        $ertek = $_POST['ertek'];

        $kivont_osszeg = $alap_szamla['osszeg'] - $ertek;
        if($kivont_osszeg >= 0){
            $tranzakcio = $alap_szamla['tranzakcio'] + $ertek;
            $conn->query("UPDATE szamlak SET osszeg = $kivont_osszeg, tranzakcio = $tranzakcio WHERE szamlaszam = '$errol'");

            //Másik számla lekérése
            $masik_leked = "SELECT * FROM szamlak WHERE szamlaszam = '$masiknak_szamla'";
            $masik_talalt = $conn->query($masik_leked);
            $masik = $masik_talalt->fetch_assoc();
            //Hozzáadni a pénzt
            $osszeg = $masik['osszeg'] + $ertek;
            $conn->query("UPDATE szamlak SET osszeg = $osszeg WHERE szamlaszam = '$masiknak_szamla'");
        }else{
            echo '<script>alert("Nincs elég fedezet a kártyán!")</script>';
        }

        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utalás</title>
    <link rel="stylesheet" href="css/all-style.css">
    <link rel="stylesheet" href="css/utalas-style.css">

    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>
<body>
    <header>
        <ul class="navbar">
            <li><a href="szamla.php?code=<?=$code?>">Számla</a></li>
            <li><a href="atm.php?code=<?=$code?>">ATM</a></li>
        </ul>
    </header>
    <div class="adatok">
        <h2><?=$customer['knev']?></h2>
        <h3>Számlaszámod:<br></mod:br><?=$errol?></h3>
    </div>
    <div>
        <div>
            <h3>Saját számlára utalás</h3>
            <form action="utalas.php?szamlaszam=<?=$errol?>&code=<?=$code?>" method="post">
                <select name="utalas_szamla">
                    <?php
                        $lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code'";
                        $talalt = $conn->query($lekerd);
                        while($szamla = $talalt->fetch_assoc()){
                            if($szamla['szamlaszam'] != $errol){
                    ?>
                    <option value="<?= $szamla['szamlaszam']?>"><?= $szamla['szamlaszam']?></option>
                    <?php  }} ?>
                </select>
                <input type="number" name="ertek" placeholder="Érték (Ft)">
                <button class="btn" name="sajatutalas-btn">Utalás</button>
            </form>
        </div>
        <div>
            <h3>Más számlájára utalás</h3>
            <form action="utalas.php?szamlaszam=<?=$errol?>&code=<?=$code?>" method="post">
                <input type="text" name="kereso" id="kereso" placeholder="Keresés">
                <select name="mas_szamla" id="szamlaszamok">
                    <option value="0">Itt tudod kiválasztani a megfelelő számlaszámot</option>
                </select>
                <input type="text" name="ertek" placeholder="Érték (Ft)">
                <button class="btn" name="masutalas-btn">Utalás</button>
            </form>
        </div>
    </div>
    <script>
	    document.getElementById('kereso').addEventListener('keyup', (e)=>{
		    const adat = e.target.value.toLowerCase();
		    $("#szamlaszamok").load("findszamlaszam.php?find="+adat+"&code=<?=$code?>");
	    });
    </script>
</body>
</html>