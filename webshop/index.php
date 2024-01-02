<?php
    require "config.php";
    require "function.php";
    

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
        <!-- CHATGPT IRTA, AZERT VANNAK BENNE EKEZETEK -->
        <h1 class="pheading">Üdv a SteelCrafters Webshopbán</h1>
        <strong><h3>Üdvözölünk a "SteelCrafters" webshopban, ahol a kivételes minőségű és egyedi késdesign találkozik a funkcionalitással! Mi, a SteelCrafters csapata, szenvedélyesen hiszünk abban, hogy a kés nemcsak egy eszköz, hanem egy stílusos kiegészítő is, amely kifejezi egyéniségedet és egyediségedet.
        Fedezd fel a kés világának sokszínűségét webshopban, és tegyél szert olyan különleges darabokra, amelyek nemcsak eszközként, hanem egyedi stílusod kifejezőjeként is szolgálnak. Legyél részese egy kivételes késélménynek velünk!</h3></strong>
    </section>
    <section class="sec">
        <h1 class="pheading">Uj Termekek</h1>
        <div class="products">

            <?php
                $lekerd="SELECT * FROM products ORDER BY id DESC LIMIT 5";
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
    <div class="on_salebackground">
        <section class="sec">
            <h1 class="pheading">Akcios Termekek</h1>
            <div class="products">

                <?php
                    $lekerd="SELECT * FROM products WHERE on_sale=1";
                    $talalt = $conn->query($lekerd);
                    while ($termek = $talalt->fetch_assoc()) {

                ?>
                <div class="card">
                    <div class="img"><img src="assets/img/products/<?=$termek['img']?>" alt=""></div>
                    <div class="title"><?=$termek['name']?></div>
                    <div class="desc"><?= $termek['category']?></div>
                    <div class="box">
                        <div class="price"><?=$termek['sale_price']?> Ft</div>
                        <div class="original_price"><?=$termek['price']?> Ft</div>
                        <form action="index.php?id=<?=$termek['id']?>" method="post">
                            <input class="btn" name="AddCart-btn" type="submit" value="Kosarba adas">
                        </form>
                        
                    </div>
                </div>
                <?php } ?>
                <!-- Card end -->
            </div>
        </section>
    </div>
    <section class="sec">
        <h1 class="pheading">Legkellendobb Termekek</h1>
        <div class="products">

            <?php
                $lekerd="SELECT * FROM products WHERE on_sale=0 ORDER BY sold DESC LIMIT 5";
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
    
    

    <div id="footer">

    </div>
</body>
</html>
<script>
    $('#navjs').load('nav.php');
    $('#footer').load('footer.php');
</script>