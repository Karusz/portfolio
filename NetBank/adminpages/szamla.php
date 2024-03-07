<?php
    require "../config.php";
    require "functions.php";

    $code = $_GET['code'];

    $lekerd = "SELECT * FROM users WHERE code = '$code'";
    $talalt = $conn->query($lekerd);
    $customer = $talalt->fetch_assoc();

    if(isset($_POST['new-sz'])){
        $szamlaszam = SzamlaGenerate();
        $conn->query("INSERT INTO szamlak VALUES('$code','$szamlaszam',0)");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ügyfél számlája</title>
    
    <link rel="stylesheet" href="../css/all-style.css">
    <link rel="stylesheet" href="css/cust-szamla.css">
</head>
<body>
    <header>
        <ul class="navbar">
            <li><a href="newcustomer.php">Új ügyfél</a></li>
            <li><a href="index.php">Ügyfél kereső</a></li>
        </ul>
    </header>


</div>
    <div class="functions">
        <form action="szamla.php?code=<?= $customer['code'] ?>" method="post">
            <button class="add-btn" name="new-sz">Új Számla</button>
            <button class="add-btn" name="new-card">Új Kártya</button>
        </form>
        <button class="remove-btn" name="new-card">Kártya Törlése</button>
        <button class="remove-btn" name="new-card">Számla Törlése</button>
    </div>
    <div class="vonal"></div>
    <div class="adatok">
        <h2><?= $customer['vnev']." ".$customer['knev'] ?></h2>
        <h3>Azonosító: <?= $customer['code']?></h3>
    </div>
    <div>
        <table>
            <tr>
                <th>Számlaszám</th>
                <th>Összeg</th>
            </tr>
            <?php
    //Számlaszám
    $sz_lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code'";
    $sz_talalt = $conn->query($sz_lekerd);
    while($szamla = $sz_talalt->fetch_assoc()){    
?>
    <tr>
        <td><?=$szamla['szamlaszam']?></td>
        <td><?=$szamla['osszeg']?> Ft</td>
    </tr>
<?php } ?>
        </table>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>