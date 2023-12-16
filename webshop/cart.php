<?php
    require "config.php";
    require "function.php";

    if (isset($_POST['removecart-btn'])) {
        RemoveCart($_GET['removeid']);
    }

    if (isset($_POST['order-btn'])) {
        if($_POST['cashpay-check']){
            $fizetes = $_POST['cashpay-check'];
        }elseif ($_POST['cardpay-check']) {
            $fizetes = $_POST['cardpay-check'];
        }else{
            echo '<script>alert("Nem valasztottal fizetesi modot!")</script>';
        }
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
        NewOrder($fizetes, $telefon, $email, $vnev, $knev, $utca, $hazsz, $iranyitosz, $varos, $emelet, $csengo, $lepcsohaz, $uzenetafutarnak);
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
                    <form action="cart.php" method="post">
                        <input type="checkbox" name="cardpay-check" id="cardpay-check">
                    </form>
                    <i class="fa-regular fa-credit-card fa-2xl"></i>
                    <h4>Elore utalas ( 0Ft )</h4>
                    <p>Elore utalas eseten csak bankartyaval tudsz fizetni.</p>
                </span>
            </div>
            <div onclick="Cashpay()" class="cashpay" id="cashpay">
                <span class="info">
                    <form action="cart.php" method="post">
                        <input type="checkbox" name="cashpay-check" id="cashpay-check">
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
            <form action="cart.php" method="post">
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
                    <input type="submit" name="order-btn" value="Megrendelem!">
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


//!!!!!!!!!!!!!!!!!!!!!MEGNEZNI, MERT NEM JO!!!!!!!!!!!!!!!!!!!!!!!!!!


var kijelolt ='';
function Cardpay(){
    if(!document.getElementById('cardpay').style.border || document.getElementById('cardpay').style.border === 'none'){
        if(kijelolt != 'cashpay'){
            kijelolt = 'cardpay';
            document.getElementById('cardpay').style.border = "1px solid red";
            document.getElementById('cardpay-chech').checked = true;
        }else{
            document.getElementById('cashpay').style.border = "none";
            document.getElementById('cashpay-check').checked = false;
            document.getElementById('cardpay').style.border = "1px solid red";
            document.getElementById('cardpay-chech').checked = true;
            kijelolt = 'cardpay';
        }
    }else{
        document.getElementById('cardpay').style.border = "none";
        document.getElementById('cardpay-chech').checked = false;
        kijelolt = 'cashpay';
    }
}

function Cashpay(){
    if(!document.getElementById('cashpay').style.border || document.getElementById('cashpay').style.border === 'none'){
        if(kijelolt !== 'cardpay'){
            kijelolt = 'cashpay';
            document.getElementById('cashpay').style.border = "1px solid red";
            document.getElementById('cashpay-check').checked = true;
        }else{
            document.getElementById('cardpay').style.border = "none";
            document.getElementById('cashpay').style.border = "1px solid red";
            document.getElementById('cashpay-chech').checked = true;
            kijelolt = 'cashpay';
        }
    }else{
        document.getElementById('cashpay').style.border = "none";
        document.getElementById('cashpay-check').checked = false;
        kijelolt = 'cardpay';
    }
}
//Pay kivalasztasa end
    $('#navbar').load('nav.php');
</script>