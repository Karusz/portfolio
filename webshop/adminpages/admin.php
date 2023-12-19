<?php
    require '../config.php';
    session_start();
    $current_page = $_SERVER['SCRIPT_NAME'];
    $userid = $_SESSION['id'];
    $lekerd = 'SELECT * FROM users WHERE id='.$userid;
    $talalt = $conn->query($lekerd);
    $admin = $talalt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/all-style.css">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

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
                    <h1>Analizis</h1>
                    <h4>Udv, <?= $admin['name']?></h4>
                </div>
            </div>
            <!-- Insights -->
            <?php
                $lekerd = "SELECT * FROM users";
                $talalt = $conn->query($lekerd);
            ?>
            <ul class="insights">
                <li>
                    <i class="fa-solid fa-user fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Felhasznalok</p>
                    </span>
                </li>
            <?php
                $lekerd = 'SELECT * FROM admins';
                $talalt = $conn->query($lekerd);
                $sum = mysqli_fetch_array($talalt)
            ?>
                <li>
                    <i class="fa-solid fa-user-tie fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Adminok</p>
                    </span>
                </li>    
            <?php
                $lekerd = 'SELECT SUM(price) FROM checks';
                $talalt = $conn->query($lekerd);
                $sum = mysqli_fetch_array($talalt)
            ?>
                <li>
                    <i class="fa-solid fa-hand-holding-dollar fa-2xl"></i>
                    <span class="info">
                        <h3><?php if($sum['SUM(price)'] == 0){ echo'0';}else{echo $sum['SUM(price)']; }?> Ft</h3>
                        <p>Bevetel</p>
                    </span>
                </li>
            <?php
                $lekerd = 'SELECT * FROM cupons';
                $talalt = $conn->query($lekerd);
            ?>
                <li>
                    <i class="fa-solid fa-ticket-simple fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Aktiv Kuponok</p>
                    </span>
                </li>
            <?php
            $lekerd = 'SELECT * FROM products';
            $talalt = $conn->query($lekerd);
            ?>
                <li>
                    <i class="fa-solid fa-shop fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Osszes Termek</p>
                    </span>
                </li> 
            <?php
                $lekerd = 'SELECT * FROM orders WHERE status="pending"';
                $talalt = $conn->query($lekerd);
            ?>
                <li>
                    <i class="fa-solid fa-box-open fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Osszeallitasban levo rendelesek</p>
                    </span>
                </li>
            <?php
                $lekerd = 'SELECT * FROM orders WHERE status="process"';
                $talalt = $conn->query($lekerd);
            ?>
                <li>
                    <i class="fa-solid fa-clock fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Kiszallitas alatt levo rendelesek</p>
                    </span>
                </li>
            <?php
                $lekerd = 'SELECT * FROM orders WHERE status="completed"';
                $talalt = $conn->query($lekerd);
            ?>
                <li>
                    <i class="fa-solid fa-check fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Kesz rendelesek</p>
                    </span>
                </li>
            <?php
                $lekerd = 'SELECT * FROM orders WHERE status="failed"';
                $talalt = $conn->query($lekerd);
            ?>
                <li>
                    <i class="fa-solid fa-xmark fa-2xl"></i>
                    <span class="info">
                        <h3><?= mysqli_num_rows($talalt)?></h3>
                        <p>Sikertelen rendelesek</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <h3>5 Legujabb Rendeles</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nev</th>
                                <th>Email</th>
                                <th>Rendeles Datuma</th>
                                <th>Statusz</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $lekerd = 'SELECT * FROM orders ORDER BY id DESC LIMIT 5 ';
                            $talalt = $conn->query($lekerd);
                            while($rendeles = $talalt->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?= $rendeles['order_name']?></td>
                                <td><?= $rendeles['order_email']?></td>
                                <td><?=$rendeles['date']?></td>
                                <td><span class="status <?=$rendeles['status']?>"><?php
                                switch ($rendeles['status']) {
                                    case 'pending':
                                        echo 'Feldolgozas';
                                        break;
                                
                                    case 'process':
                                        echo 'Kiszallitas';
                                        break;

                                    case 'completed':
                                        echo 'Kiszallitva';
                                        break;

                                    case 'failed':
                                        echo 'Hiba tortent';
                                        break;
                                    default:
                                        break;
                                }
                            ?></span></td>
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