<?php
    require "../config.php";
    require "functions.php";

    $code = $_GET['code'];

    $lekerd = "SELECT * FROM users WHERE code = '$code'";
    $talalt = $conn->query($lekerd);
    $customer = $talalt->fetch_assoc();

    if(isset($_POST['new-sz'])){
        $szamlaszam = SzamlaGenerate();
        $ido = date("Y/m/d");
        $conn->query("INSERT INTO szamlak VALUES('$code','$szamlaszam',0,0,'$ido')");
    }

    if(isset($_POST['deleteSzamlaszam'])){
        $torles = $_POST['deleteSzamlasz'];
        $conn->query("DELETE FROM szamlak WHERE szamlaszam='$torles'");
    }

    if(isset($_POST['deleteCard-btn'])){
        $torles = $_POST['kartyaDeleteSz'];
        $conn->query("DELETE FROM cards WHERE kartyaszam='$torles'");
    }

    if(isset($_POST['up-btn'])){
        $ertek = $_POST['ertek'];
        $szamlaszam = $_POST['ember-szamlaszam'];

        $lekerd = "SELECT * FROM szamlak WHERE szamlaszam = '$szamlaszam'";
        $talalt = $conn->query($lekerd);
        $sz = $talalt->fetch_assoc();

        $ertek += $sz['osszeg'];

        $conn->query("UPDATE szamlak SET osszeg = $ertek WHERE szamlaszam = '$szamlaszam'");
    }

    if(isset($_POST['new-card'])){
        header("Location: newcard.php?code=$code");
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
    
    <div id="szamlaDeleteModal" class="modal">
        <div class="modal-content">
            <span class="close szclose">&times;</span>
            <form action="szamla.php?code=<?=$code?>" method="post">
                <label>Melyik Számlaszámot szeretnéd törölni?: </label>
                <select name="deleteSzamlasz" class="modalSelect">
                    <?php
                        $lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code' ORDER BY osszeg";
                        $talalt = $conn->query($lekerd);
                        while($szamla=$talalt->fetch_assoc()){
                    ?>
                        <option value="<?= $szamla['szamlaszam']?>"><?= $szamla['szamlaszam']?></option>
                    <?php } ?>
                </select>
                <button class="remove-btn" name="deleteSzamlaszam">Törlés</button>
            </form>
        </div>
    </div>
    <div id="kartyaDeleteModal" class="modal">
        <div class="modal-content">
            <span class="close kclose">&times;</span>
            <form action="szamla.php?code=<?=$code?>" method="post">
                <label>Melyik Kártyaszámot szeretnéd törölni?: </label>
                <select name="kartyaDeleteSz" class="modalSelect">
                    <?php
                        $lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$code' ORDER BY osszeg";
                        $talalt = $conn->query($lekerd);
                        $szamla=$talalt->fetch_assoc();

                        $lekerd = "SELECT * FROM cards WHERE szamlaszam = '$szamla[szamlaszam]'";
                        $talalt = $conn->query($lekerd);
                        while($card = $talalt->fetch_assoc()){
                    ?>
                        <option value="<?= $card['kartyaszam']?>"><?= $card['kartyaszam']?></option>
                    <?php } ?>
                </select>
                <button class="remove-btn" name="deleteCard-btn">Törlés</button>
            </form>
        </div>
    </div>
    <div id="addMondeyModal" class="modal">
        <div class="modal-content">
            <span class="close mclose">&times;</span>
            <div class="add-money">
                <h2>Pénz feltöltése</h2>
                <form action="szamla.php?code=<?=$customer['code']?>" method="post">
                    <select name="ember-szamlaszam">
                        <?php
                            $lekerd = "SELECT * FROM szamlak WHERE user_azonosito = '$customer[code]'";
                            $talalt = $conn->query($lekerd);
                            while($szamla=$talalt->fetch_assoc()){
                        ?>
                            <option value="<?= $szamla['szamlaszam'] ?>"><?= $szamla['szamlaszam'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" name="ertek" placeholder="Ft">
                    <input class="add-btn" type="submit" name="up-btn" value="Feltöltés">
                </form>
            </div>
        </div>
    </div>
    <div class="functions">
        <div class="removebtns">
            <button class="remove-btn" id="deleteSzBtn">Számla Törlése</button>
            <button class="remove-btn" id="deleteKBtn">Kártya Törlése</button>
        </div>
        <div class="addbtns">
            <button class="add-btn" id="addMoneyBtn">Összeg hozzáadása</button>
        </div>
        <form action="szamla.php?code=<?= $customer['code'] ?>" method="post">
            <button class="add-btn" name="new-sz">Új Számla</button>
            <button class="add-btn" name="new-card">Új Kártya</button>
        </form>
        
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