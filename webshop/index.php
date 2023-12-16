<?php
    require "config.php";

    $lekerd="SELECT * FROM products";
    $talalt = $conn->query($lekerd);


?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/index-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS -->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/js/main.js"></script>

</head>
<body>
    <!-- NAVBAR -->
    <div id=navjs>

    </div>
    <!-- NAVBAR END -->
    <section class="sec">
        <h1 class="pheading">Akcios Termekek</h1>
        <div class="products">

            <?php
            
            while ($termek = $talalt->fetch_assoc()) {

            ?>
            <!-- Card start-->
            <div class="card">
                <div class="img"><img src="assets/img/products/<?=$termek['img']?>" alt=""></div>
                <div class="title"><?=$termek['name']?></div>
                <div class="desc"><?= $termek['size']?></div>
                <div class="box">
                    <div class="price"><?=$termek['price']?> Ft</div>
                    <form action="index.php" method="post">
                        <input onclick="Kosarba()" class="btn" type="button" value="Kosarba adas">
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
    $('#navjs').load('nav.php');
</script>