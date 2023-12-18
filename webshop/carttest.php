<?php
    require "config.php";
    require "function.php";

    

    if (isset($_POST['removecart-btn'])) {
        RemoveCart($_GET['removeid']);
    }

    if (isset($_POST['cashpay-btn'])) {
            $fizetes = 'utanvetel';
            $telefon = $_POST['telefon'];
            $email = $_POST['email'];
            $vnev = $_POST['vnev'];
            $knev = $_POST['knev'];
            $utca = $_POST['utca'];
            $hazsz = $_POST['hazszam'];
            $iranyitosz = $_POST['iranyitoszam'];
            $varos = $_POST['varos'];
            if (!empty($_POST['emelet'])) {

                $emelet = $_POST['emelet'];

            }else {

                $emelet = '';

            }
            if (!empty($_POST['csengo'])) {

                $csengo = $_POST['csengo'];

            }else {

                $csengo = '';

            }
            if (!empty($_POST['lepcsohaz'])) {

                $lepcsohaz = $_POST['lepcsohaz'];

            }else {

                $lepcsohaz = '';

            }
            if (!empty($_POST['uzenetafutarnak'])) {

                $uzenetafutarnak = $_POST['uzenetafutarnak'];

            }else {

                $uzenetafutarnak = '';

            }
            echo 'leadva';
            //NewOrder($fizetes, $telefon, $email, $vnev, $knev, $utca, $hazsz, $iranyitosz, $varos, $emelet, $csengo, $lepcsohaz, $uzenetafutarnak);

        }

    if (isset($_POST['cardpay-btn'])) {
            $fizetes = 'eloreutalas';
            $telefon = $_POST['telefon'];
            $email = $_POST['email'];
            $vnev = $_POST['vnev'];
            $knev = $_POST['knev'];
            $utca = $_POST['utca'];
            $hazsz = $_POST['hazszam'];
            $iranyitosz = $_POST['iranyitoszam'];
            $varos = $_POST['varos'];
            if (!empty($_POST['emelet'])) {

                $emelet = $_POST['emelet'];

            }else {

                $emelet = '';

            }
            if (!empty($_POST['csengo'])) {

                $csengo = $_POST['csengo'];

            }else {

                $csengo = '';

            }
            if (!empty($_POST['lepcsohaz'])) {

                $lepcsohaz = $_POST['lepcsohaz'];

            }else {

                $lepcsohaz = '';

            }
            if (!empty($_POST['uzenetafutarnak'])) {

                $uzenetafutarnak = $_POST['uzenetafutarnak'];

            }else {

                $uzenetafutarnak = '';

            }
            echo 'leadva';
            //NewOrder($fizetes, $telefon, $email, $vnev, $knev, $utca, $hazsz, $iranyitosz, $varos, $emelet, $csengo, $lepcsohaz, $uzenetafutarnak);

        }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/cart-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/js/main.js"></script>


</head>
<body>
    <div id="navbar"></div>
    <h1>Kosar</h1>
    <h3>Termekek szama: <?php echo count($_SESSION['cart']);?></h3>
    <div class="products">
        <?php
            
            foreach ($_SESSION['cart'] as $csomag) {
                $lekerd = "SELECT * FROM products WHERE id=$csomag[0]";
                $talalt = $conn->query($lekerd);
                $termek = $talalt->fetch_assoc();
                
        ?>
        <!-- Card start-->
        <div class="card">
            <div class="img"><img src="assets/img/products/<?=$termek['img']?>" alt=""></div>
            <div class="title"><?=$termek['name']?></div>
            <div class="desc"><select name="" id="">
                <option value="">Meret</option>
                <option value="1">asd</option>
            </select></div>
            <div class="box">
                <div class="price">Ertek Ft</div>
                <form action="cart.php?removeid=<?= array_search($csomag, $_SESSION['cart'])?>" method="post">
                        <input class="btn" name="removecart-btn" type="submit" value="Eltavolitas">
                    </form>
            </div>
        </div>
        <?php } ?>
        <!-- Card end -->
    </div>
    <hr>
    <h2>Rendeles leadasa</h2>
    <h3>Fizetes:</h3>
    <div class="pay">
        
            <div onclick="Cardpay()" class="cardpay" id="cardpay">
                <span class="info">

                        <input type="checkbox" name="cardpay-check" id="cardpay-check" hidden>

                    <i class="fa-regular fa-credit-card fa-2xl"></i>
                    <h4>Elore utalas ( 0Ft )</h4>
                    <p>Elore utalas eseten csak bankartyaval tudsz fizetni.</p>
                </span>
            </div>
            <div onclick="Cashpay()" class="cashpay" id="cashpay">
                <span class="info">
                    <form action="cart.php" method="post">
                        <input type="checkbox" name="cashpay-check" id="cashpay-check" hidden>
                    </form>
                    <i class="fa-solid fa-wallet fa-2xl"></i>
                    <h4>Fizetes atvetelkor ( +200Ft )</h4>
                    <p>Atvetelkor bankartyaval illetve kezpenzel is tudsz fizetni. </p>
                </span>
            </div>
        
    </div>
    <h3>Szemelyes adatok:</h3>
    <div class="userdata">
        
        <div class="user-container">
            <form action="carttest.php" method="post">
                <div class="row">
                    <input type="text" name="telefon" placeholder="Telefonszam">
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="vnev" placeholder="Vezeteknev">
                    <input type="text" name="knev" placeholder="Keresztnev">
                </div>
                <div class="row">
                    <input type="text" name="utca" placeholder="Utca">
                    <input type="text" name="hazszam" placeholder="Hazszam">
                    <input type="text" name="iranyitoszam" placeholder="Iranyitoszam">
                    <input type="text" name="varos" placeholder="Varos">
                </div>
                <div class="row">
                    <input type="text" name="emelet" placeholder="Emelet">
                    <input type="text" name="csengo" placeholder="Csengo">
                    <input type="text" name="lepcsohaz" placeholder="Lepcsohaz">
                </div>
                <div class="row">
                    <textarea name="uzenet" placeholder="Uzenet a futarnak"></textarea>
                </div>
                <div class="startorder">
                    <input type="submit" name="cardpay-btn" value="card Megrendelem!" id="cardpay-btn">
                    <input type="submit" name="cashpay-btn" value="cash Megrendelem!" id="cashpay-btn">
                </div>
            </form>
        </div>
    </div>
    
    <footer>
        <p><a>Webshop</a></p><br>
        <p>Php beadando Mod Karoly 14/A</p>
    </footer>
    
    
</body>
</html>
<script>
//Pay kivalasztasa start
document.getElementById('cardpay-btn').style.display = 'none';
document.getElementById('cashpay-btn').style.display = 'none';
var cb_cash = document.getElementById('cashpay-check');//utanvetel
var cb_card = document.getElementById('cardpay-check');

function Cardpay(){
    if (!cb_cash.checked) { //Ha nincs kijelolve a kezpenzes fizetes
        if (!cb_card.checked) { //Ha nincs kijelolve a kartyas fizetes
            document.getElementById('cardpay').style.border = "1px solid blue"; //Akkor a kartyas fizetes legyen kijelolve
            cb_card.checked = true; //Jelolje be a kartyas fizetes checkbox-ot
            document.getElementById('cardpay-btn').style.display = 'inline';
            
        }else{ //Ha kivan
            document.getElementById('cardpay').style.border = "none"; //Akkor a kartyas fizetes legyen kijelolve
            cb_card.checked = false; //Jelolje be a kartyas fizetes checkbox-ot
            document.getElementById('cardpay-btn').style.display = 'none'; // ne latszodjon a cardpay gomb
        }
    }else{//Ha ki van jelolve a kezpenzes fizetes
            document.getElementById('cashpay').style.border = "none"; 
            document.getElementById('cardpay-btn').style.display = 'none';
            cb_cash.checked = false;
            document.getElementById('cardpay').style.border = "1px solid blue"; 
            document.getElementById('cardpay-btn').style.display = 'inline';
            cb_card.checked = true;
    }

    if (cb_card.checked && !cb_cash.checked) {
        document.getElementById('cashpay-btn').style.display = 'none';
        document.getElementById('cardpay-btn').style.display = 'inline';
    }else{
        document.getElementById('cashpay-btn').style.display = 'none';
    }
}

function Cashpay(){//kezpenz
    if (!cb_card.checked) { //Ha nincs kijelolve a kartyas fizetes
        if (!cb_cash.checked) { //Ha nincs kijelolve a kezpenzes fizetes
            document.getElementById('cashpay').style.border = "1px solid blue"; //Akkor a kartyas fizetes legyen kijelolve
            cb_cash.checked = true; //Jelolje be a kartyas fizetes checkbox-ot
        }else{ //Ha kivan
            document.getElementById('cashpay').style.border = "none"; //Akkor a kartyas fizetes legyen kijelolve
            cb_cash.checked = false; //Jelolje be a kartyas fizetes checkbox-ot
            
        }
    }else{//Ha ki van jelolve a kartyas fizetes
            document.getElementById('cashpay').style.border = "1px solid blue"; 
            cb_cash.checked = true;
            document.getElementById('cardpay').style.border = "none"; 
            cb_card.checked = false;
    }

    if (cb_cash.checked && !cb_card.checked) {
        document.getElementById('cashpay-btn').style.display = 'inline';
        document.getElementById('cardpay-btn').style.display = 'none';
    }else{
        document.getElementById('cashpay-btn').style.display = 'none';
    }
}
//Pay kivalasztasa end
    $('#navbar').load('nav.php');
</script>