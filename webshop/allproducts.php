<?php
    require "config.php";
    require "function.php";
    
    $show = "all";

    if(isset($_POST['AddCart-btn'])){
        $id = $_GET['id'];
        AddCart($id);
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
    <link rel="stylesheet" href="assets/css/allproducts-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/js/main.js"></script>

</head>
<body>
    <!-- NAVBAR -->
    <div id=navjs>
        
    </div>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
    </div>
    <span style="font-size:30px;cursor:pointer; color:red;" onclick="openNav()">&#9776; Webshop</span>
    <!-- NAVBAR END -->
    <section class="sec">
        <h1 class="pheading">Osszes Termek</h1>
        <div class="products">

            <?php
                $lekerd="SELECT * FROM products";
                $talalt = $conn->query($lekerd);
                while ($termek = $talalt->fetch_assoc()) {

            ?>
            <div class="card">
                <div class="img"><img src="assets/img/products/<?=$termek['img']?>" alt=""></div>
                <div class="title"><?=$termek['name']?></div>
                <div class="desc"><?= $termek['category']?></div>
                <div class="box">
                    <div class="price"><?=$termek['price']?> Ft</div>
                    <form action="index.php?id=<?=$termek['id']?>" method="post">
                        <input class="btn" name="AddCart-btn" type="submit" value="Kosarba adas">
                    </form>
                    
                </div>
            </div>
            <?php } ?>
            <!-- Card end -->
        </div>
     </section>
    
    

    <footer>
        <p><a>Webshop</a></p><br>
        <p>Php beadando Mod Karoly 14/A</p>
    </footer>
</body>
</html>
<script>
    //$('#navjs').load('categorynav.php');
</script>