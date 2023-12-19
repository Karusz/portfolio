<?php
    require '../config.php';
    $termekid = $_GET['id'];

    $lekerd = "SELECT * FROM products WHERE id=$termekid";
    $talalt = $conn->query($lekerd);
    $termek = $talalt->fetch_assoc();

    if (isset($_POST['edit-btn'])) {
        # code...
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
                    <h1>Termek Szerkezto</h1>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3><?= $termek['name'] ?> Adatai</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nev</th>
                                <th>Meretek</th>
                                <th>Ar</th>
                                <th>Akcios Ar</th>
                                <th>Akcios</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <tr>
                                <td></td>
                                <td><?=$termek['name']?></td>
                                <td><?=$termek['sizes']?></td>
                                <td><?=$termek['price']?> Ft</td>
                                <td><?=$termek['sale_price']?> Ft</td>
                                <td><?php if($termek['on_sale']==0){echo 'Nem';}else{echo 'Igen';} ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3><?= $termek['name'] ?> Szerkesztese</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nev</th>
                                <th>Meretek</th>
                                <th>Ar</th>
                                <th>Akcios Ar</th>
                                <th>Akcios</th>
                                <th>Muvelet</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <tr>
                                <form action="edittermek.php?id=<?= $termekid ?>" method="post">
                                    <td><input type="text" name="pname" placeholder="Nev"></td>
                                    <td><input type="text" name="pname" placeholder="Nev"></td>
                                    <td><input type="text" name="pname" placeholder="Nev"></td>
                                    <td><input type="text" name="pname" placeholder="Nev"></td>
                                    <td><input type="text" name="pname" placeholder="Nev"></td>
                                    <td><input type="submit" class="submitbtn" name="edit-btn" value="Mentes!"></td>
                                </form>
                            </tr>
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