<?php
    require "config.php";
    require "function.php";
    
    $showcategory = "allcategory";
    $showcolor = "allcolor";
    $showdirection = "all";

    if(isset($_POST['AddCart-btn'])){
        $id = $_GET['id'];
        AddCart($id);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
		$showcategory = $_POST['showcategory'];
        $showcolor = $_POST['showcolor'];
        $showdirection = $_POST['showdirection'];
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
    <div>
    <nav class="navbar" id="navjs">
        
    </nav>
    <!-- NAVBAR END -->
    <!-- SIDENAV -->
        <div class="sidebar">
            
            <form method="post" action="allproducts.php">
                <div>
                <a><h3>Szuro</h3></a>
                    <label>Termek</label>
                    <select name="showcategory" selected="selected" onchange="this.form.submit()">
                        <option value="allcategory" 
                            <?php if($showcategory == "allcategory"){ ?>
                                selected
                            <?php } ?>
                            >Minden</option>
                        <option value="butterfly"
                            <?php if($showcategory == "butterfly"){ ?>
                                selected
                            <?php } ?>
                        >Butterfly</option>
                        <option value="karambit"
                            <?php if($showcategory == "karambit"){ ?>
                                selected
                            <?php } ?>
                        >Karambit</option>
                        <option value="huntsman"
                            <?php if($showcategory == "huntsman"){ ?>
                                selected
                            <?php } ?>
                        >Huntsman</option>
                        <option value="egyeb"
                            <?php if($showcategory == "egyeb"){ ?>
                                selected
                            <?php } ?>
                        >Egyeb</option>
                    </select><br>
                    <label>Szin</label>
                    <select name="showcolor" selected="selected" onchange="this.form.submit()">
                        <option value="allcolor" 
                            <?php if($showcolor == "allcolor"){ ?>
                                selected
                            <?php } ?>
                            >Minden Szin</option>
                        <option value="gold"
                            <?php if($showcolor == "gold"){ ?>
                                selected
                            <?php } ?>
                        >Arany</option>
                        <option value="galaxy"
                            <?php if($showcolor == "galaxy"){ ?>
                                selected
                            <?php } ?>
                        >Galaxy</option>
                        <option value="fade"
                            <?php if($showcolor == "fade"){ ?>
                                selected
                            <?php } ?>
                        >Fade</option>
                        <option value="green"
                            <?php if($showcolor == "green"){ ?>
                                selected
                            <?php } ?>
                        >Zold</option>
                        <option value="blue"
                            <?php if($showcolor == "blue"){ ?>
                                selected
                            <?php } ?>
                        >Kek</option>
                        <option value="orange"
                            <?php if($showcolor == "orange"){ ?>
                                selected
                            <?php } ?>
                        >Narancs</option>
                        <option value="black"
                            <?php if($showcolor == "black"){ ?>
                                selected
                            <?php } ?>
                        >Fekete</option>
                        <option value="red"
                            <?php if($showcolor == "red"){ ?>
                                selected
                            <?php } ?>
                        >Piros</option>
                    </select><br>
                    <label>Rendezes</label>
                    <select name="showdirection" selected="selected" onchange="this.form.submit()">
                        <option value="all" 
                            <?php if($showdirection == "all"){ ?>
                                selected
                            <?php } ?>
                            >Sima rendezes</option>
                        <option value="a-z"
                            <?php if($showdirection == "a-z"){ ?>
                                selected
                            <?php } ?>
                        >A-Z</option>
                        <option value="z-a"
                            <?php if($showdirection == "z-a"){ ?>
                                selected
                            <?php } ?>
                        >Z-A</option>
                        <option value="new"
                            <?php if($showdirection == "new"){ ?>
                                selected
                            <?php } ?>
                        >Uj - Regi</option>
                        <option value="cheap"
                            <?php if($showdirection == "cheap"){ ?>
                                selected
                            <?php } ?>
                        >Olcso - Draga</option>
                        <option value="costly"
                            <?php if($showdirection == "costly"){ ?>
                                selected
                            <?php } ?>
                        >Draga - Olcso</option>
                    </select><br>
                    
                </div>
                
            </form>
        </div>
    <div class="main">
    <section class="sec">
        <div class="products">
            <?php
            //kategoria
            switch ($showcategory) {
                case 'allcategory':
                    $categorylekerd = "SELECT * FROM products ";
                    break;
                case 'butterfly':
                    $categorylekerd = "SELECT * FROM products WHERE category='butterfly'";
                    break;
                case 'karambit':
                    $categorylekerd = "SELECT * FROM products WHERE category='karambit'";
                    break;
                case 'huntsman':
                    $categorylekerd = "SELECT * FROM products WHERE category='huntsman'";
                    break;
                case 'egyeb':
                    $categorylekerd = "SELECT * FROM products WHERE category='egyeb'";
                    break;
                default:
                    break;
            }

            //szin
            switch ($showcolor) {
                case 'allcolor':
                    $colorlekerd = "";
                    break;
                case 'gold':
                    $colorlekerd = "name LIKE '%gold%'";
                    break;
                case 'red':
                    $colorlekerd = "name='red'";
                    break;
                case 'black':
                    $colorlekerd = "name='black'";
                    break;
                case 'green':
                    $colorlekerd = "name='green'";
                    break;
                case 'orange':
                    $colorlekerd = "name='orange'";
                    break;
                case 'fade':
                    $colorlekerd = "name='fade'";
                    break;
                case 'galaxy':
                    $colorlekerd = "name='galaxy'";
                    break;
                case 'blue':
                    $colorlekerd = "name='blue'";
                    break;                                              
                default:
                    break;
            }
            //showdirection
            switch ($showdirection) {
                case 'all':
                    $directionlekerd = "";
                    break;
                case 'new':
                    $directionlekerd = "ORDER BY ID";
                    break;
                case 'cheap':
                    $directionlekerd = "ORDER BY price ";
                    break;
                case 'costly':
                    $directionlekerd = "ORDER BY price DESC";
                    break;
                case 'a-z':
                    $directionlekerd = "ORDER BY name";
                    break;
                case 'z-a':
                    $directionlekerd = "ORDER BY name DESC";
                    break;                                             
                default:
                    break;
            }
            
            if ($showcolor != 'allcolor' && !strpos($categorylekerd, "WHERE")) {
                $teljeslekerd = $categorylekerd."WHERE ".$colorlekerd." ".$directionlekerd;
            }
            else if($showcolor != 'allcolor' && strpos($categorylekerd, "WHERE")){
                $teljeslekerd = $categorylekerd."AND ".$colorlekerd." ".$directionlekerd;
            }
            else{
                $teljeslekerd = $categorylekerd.$colorlekerd." ".$directionlekerd ;
            }
            $talalt = $conn->query($teljeslekerd);
            if(mysqli_num_rows($talalt) == 0){
                echo '<h1 class="alert">Nincs ilyen termek</h1>';
            }
            while($termek = $talalt->fetch_assoc()){
            ?>
            

            <div class="card">
                <div class="img"><img src="assets/img/products/<?=$termek['img']?>" alt=""></div>
                <div class="title"><?=$termek['category']?></div>
                <div class="desc"><?= $termek['name']?></div>
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
     </div>
    
    

     <div id="footer">

</div>
</body>
</html>
<script>
$('#navjs').load('nav.php');
$('#footer').load('footer.php');
</script>