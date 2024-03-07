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

    if(isset($_POST['deleteSzamlaszam'])){
        $torles = $_POST['deleteSzamlasz'];
        $conn->query("DELETE FROM szamlak WHERE szamlaszam='$torles'");
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

    <div id="szamlaDelete" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
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
    <div id="addMondeyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="add-money">
                <h2>Pénz feltöltése</h2>
                <form action="szamla.php?code=<?=$customer['code']?>" method="post">
                    <select name="ember-szamlaszam">
                        <?php
                            $lekerd = "SELECT * FROM szamlak";
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
            <button class="remove-btn" >Kártya Törlése</button>
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