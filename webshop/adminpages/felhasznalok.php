<?php
    require '../config.php';
    require '../function.php';

    if (isset($_POST['admin-btn'])) {
        AddAdmin($_POST['admin_name']);
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
                    <h1>Admin</h1>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Admin hozzaadasa</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nev</th>
                                <th>Hozzaadas</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <tr>
                                <form action="felhasznalok.php" method="post">
                                    <td><input type="text" name="admin_name" placeholder="Nev"></td>
                                    <td><input type="submit" class="submitbtn" name="admin-btn" value="Hozzaadas"></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Adminok</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nev</th>
                                <th>Torles</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <?php
                                $lekerd = "SELECT * FROM admins";
                                $talalt = $conn->query($lekerd);
                                while($admin = $talalt->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?=$admin['user_id']?></td>
                                <td><?=$admin['username']?></td>
                                <td><a href="../function.php?adminid=<?=$admin['user_id']?>"><button class="submitbtn">Torles</button></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="header">
                <div class="left">
                    <h1>Felhasznalok</h1>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Felhasznalok</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nev</th>
                                <th>Email</th>
                                <th>Cim</th>
                                <th>Telefonszam</th>
                            </tr>
                        </thead>
                        <tbody class="prodinp">
                            <?php 
                                $lekerd = "SELECT * FROM users";
                                $talalt = $conn->query($lekerd);
                                //Ha admin, akkor ne jelenjen meg
                                while($user = $talalt->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?=$user['id']?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['address']?></td>
                                <td><?=$user['tel']?></td>
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