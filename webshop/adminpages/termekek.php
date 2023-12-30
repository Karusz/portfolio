<?php
    require "../config.php";
    require "../function.php";
    if(isset($_POST['feltolt-btn'])){
        $file_name = $_FILES['newfile']['name'];
		$tmp = $_FILES['newfile']['tmp_name'];

        //Ha nincs ilyen mappa, akkor hozzon letre

		$eleresi_ut = "../assets/img/products/".$_POST['category']."/".$file_name;
		
		if(move_uploaded_file($tmp, $eleresi_ut)){
            ProductFeltolt($_POST['pname'],$_POST['category'],$_POST['par'],$file_name);
		}
        
    }

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/all-style.css">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS -->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../assets/js/main.js"></script>
</head>

<body>

    <!-- Sidebar -->
    <div id="adminnav">

    </div>
    <!-- End of Sidebar -->
    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Termekek</h1>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Termek Hozzaadasa</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nev</th>
                                <th>Kategoria</th>
                                <th>Ar</th>
                                <th>Kep</th>
                                <th>Feltoles</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <form action="termekek.php" method="post" enctype="multipart/form-data">
                                <tr>
                                    <td><input type="text" name="pname" placeholder="Nev"></td>
                                    <td><input type="text" name="category" placeholder="Kategoria"></td>
                                    <td><input type="text" name="par" placeholder="Ar"></td>
                                    <td><label class="file-feltoltes"><input type="file" name="newfile"/>Termek Kep</label></td>
                                    <td><input class="submitbtn" name="feltolt-btn" type="submit" value="Feltoltes"></td>
                                </tr>
                            </form>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Termekek</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Nev</th>
                                <th>Kategoria</th>
                                <th>Ar</th>
                                <th>Akcios-e</th>
                                <th>Akcios Ar</th>
                                <th>Eladasi szam</th>
                                <th>Kezeles</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $lekerd = "SELECT * FROM products";
                            $talalt = $conn->query($lekerd);
                            while ($termek = $talalt->fetch_assoc()) {
                        ?>
                            <tr>
                                <td></td>
                                <td><?=$termek['id']?></td>
                                <td><?=$termek['name']?></td>
                                <td><?=$termek['category']?></td>
                                <td><?=$termek['price']?> Ft</td>
                                <td><?php if($termek['sale_price']==0){echo 'Nem';}else{echo'Igen';}?></td>
                                <td><?=$termek['on_sale']?></td>
                                <td><?=$termek['sold']?> db</td>
                                <td><a href="edittermek.php?id=<?=$termek['id']?>"><button class="submitbtn">Kezeles</button></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<script>
    $('#adminnav').load('adminnav.php');
</script>