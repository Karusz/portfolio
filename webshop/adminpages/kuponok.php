<?php
    require '../config.php';
    require '../function.php';
    if(isset($_POST['feltolt-btn'])){
        NewCupon($_POST['kdb'],$_POST['khasz'],$_POST['kertek']);
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
                    <h1>Kuponok</h1>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <h3>Kupon Hozzaadasa</h3>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Darab</th>
                                <th>Hasznalhatosag</th>
                                <th>Erteke (%-ban)</th>
                                <th>Feltoltes</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <form action="kuponok.php" method="post" enctype="multipart/form-data">
                                <tr>
                                    <td><input type="text" name="kdb" placeholder="Darab"></td>
                                    <td><input type="text" name="khasz" placeholder="Hasznalhatosaga"></td>
                                    <td><input type="text" name="kertek" placeholder="Erteke (%-ban)"></td>
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
                        <h3>Kuponok</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kod</th>
                                <th>Mennyiseg</th>
                                <th>Erteke</th>
                                <th>Muvelet</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $lekerd = "SELECT * FROM cupons ORDER BY id DESC";
                            $talalt = $conn->query($lekerd);
                            while ($cupon = $talalt->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?=$cupon['id']?></td>
                                <td><?=$cupon['code']?></td>
                                <td><?=$cupon['reedem']?> db</td>
                                <td><?=$cupon['value']?>%</td>
                                <td><a href="../function.php?cuponid=<?=$cupon['id']?>"><button class="submitbtn">Torles</button></a></td>
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