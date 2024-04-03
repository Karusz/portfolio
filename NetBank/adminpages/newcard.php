<?php
    require "../config.php";
    require "functions.php";

    $code = $_GET['code'];

    $lekerd = "SELECT * FROM users WHERE code = '$code'";
    $talalt = $conn->query($lekerd);
    $customer = $talalt->fetch_assoc();

    $sz_lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code'";
    $sz_talalt = $conn->query($sz_lekerd);
    $szamla = $sz_talalt->fetch_assoc();


    if(isset($_POST['create-card'])){
        $szamlaszam = $_POST['szamlaszam'];

        if(mysqli_num_rows($conn->query("SELECT * FROM cards WHERE szamlaszam = '$szamlaszam'")) == 0){
            if($_POST['pin'] == $_POST['repin']){
                $pin = $_POST['pin'];
    
                //Ne lehessen ugyan az a kartyaszam
                $kartyaszam = CardGenerate();
                while (mysqli_num_rows($conn->query("SELECT * FROM cards WHERE kartyaszam = '$kartyaszam'")) == 1) {
                    $kartyaszam = CardGenerate();
                }
    
                //Ne lehessen ugyan az a biztonsági kód
                $save_code = CodeGenerate(3);
                while (mysqli_num_rows($conn->query("SELECT * FROM cards WHERE save_code = '$save_code'")) == 1) {
                    $save_code = CodeGenerate(3);
                }
    
                //adatbazis formula
                $ev = date("Y");
                $ev = $ev[2].$ev[3];
                $ho = date("m");
                $lejarat = $ho."/".$ev+10;
                
                $conn->query("INSERT INTO cards VALUES('$kartyaszam','$szamlaszam','$lejarat','$save_code','$pin',1)");
                echo '<script>alert("Kártya létrehozva!")</script>';
            }else{
                echo '<script>alert("Nem egyezik a Pin kód!")</script>';
            }
        }else{
            echo '<script>alert("Már van kártya hozzáadva a számlához!")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kártya létrehozása</title>
</head>
<body>
    <div>
        <h3><?=$customer['knev']?></h3>
    </div>
    <div>
        <form action="newcard.php?code=<?=$code?>" method="post">
            <select name="szamlaszam">
                <option value="<?=$szamla['szamlaszam']?>"><?=$szamla['szamlaszam']?></option>
            </select>
            <input type="password" name="pin" placeholder="4 jegyű PIN" maxlength="4" require>
            <input type="password" name="repin" placeholder="4 jegyű PIN újra" maxlength="4" require>
            <select name="type">
                <option value="">Válassz kártya típust</option>
                <option value="Mastercard">Mastercard</option>
                <option value="Visa">Visa</option>
            </select>

            <button name="create-card">Kártya létrehozása</button>
        </form>
    </div>
</body>
</html>