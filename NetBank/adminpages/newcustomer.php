<?php
    require "../config.php";
    require "functions.php";

    if(isset($_POST['felv-btn'])){
        $kname = $_POST['kname'];
        $vname = $_POST['vname'];
        $password = $_POST['psw'];

        $azonosito = CodeGenerate(8);
        //Megnézzük, hogy van-e már olyan kóddal ellátott ügyfél
        while(mysqli_num_rows($codes = $conn->query("SELECT * FROM users WHERE code='$azonosito'")) == 1){
            $azonosito = CodeGenerate(8);
        }

        $szamlaszam = SzamlaGenerate();
        while (mysqli_num_rows($szamla = $conn->query("SELECT * FROM szamlak WHERE szamlaszam = '$szamlaszam'")) == 1) {
            $szamlaszam = SzamlaGenerate();
        }
        
        $conn->query("INSERT INTO users VALUES('$azonosito', '$vname','$kname','$password')");
        $conn->query("INSERT INTO szamlak VALUES('$azonosito','$szamlaszam',0)");
    }

    if(isset($_POST['up-btn'])){
        $fel_ember_szamla = $_POST['ember-szamlaszam'];
        $ertek = $_POST['ertek'];

        $leker = "SELECT * FROM szamlak WHERE szamlaszam = '$fel_ember_szamla'";
        $talalt = $conn->query($leker);
        $ab_szamlasz = $talalt->fetch_assoc();

        $ertek += $ab_szamlasz['osszeg'];
        
        $conn->query("UPDATE szamlak SET osszeg = $ertek WHERE szamlaszam = '$fel_ember_szamla'");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="../css/all-style.css">
    <link rel="stylesheet" href="css/newcust-style.css">
</head>
<body>
    <header>
        <ul class="navbar">
            <li><a href="newcustomer.php">Új ügyfél</a></li>
            <li><a href="index.php">Ügyfél kereső</a></li>
        </ul>
    </header>
    <div class="add-customer">
        <h2>Ügyfél hozzáadása</h2>
        <form action="newcustomer.php" method="post">
            <input type="text" name="vname" placeholder="Vezetéknév">
            <input type="text" name="kname" placeholder="Keresztnév">
            <input type="password" name="psw" placeholder="Jelszó">
            <input class="btn" type="submit" name="felv-btn" value="Ügyfél felvételte">
        </form>
    </div>
    <div class="vonal"></div>
    <div class="add-money">
        <h2>Pénz feltöltése</h2>
        <form action="newcustomer.php" method="post">
            <select name="ember-szamlaszam">
                    <option value="">Szamlaszam</option>
            </select>
            <input type="number" name="ertek" placeholder="Ft">
            <input class="btn" type="submit" name="up-btn" value="Feltöltés">
        </form>
    </div>
</body>
</html>
