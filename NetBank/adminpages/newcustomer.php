<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="../css/all-style.css">
    <link rel="stylesheet" href="css/newcust-style.css">
</head>
<body>
    <header>
        <ul class="navbar">
            <li><a href="newcustomer.php">Új ügyfél</a></li>
            <li><a href="findcustomer.php">Ügyfél kereső</a></li>
        </ul>
    </header>
    <div class="add-customer">
        <h2>Ügyfél hozzáadása</h2>
        <form action="admin.php" method="post">
            <input type="text" name="vname" placeholder="Vezetéknév">
            <input type="text" name="kname" placeholder="Keresztnév">
            <input type="password" name="psw" placeholder="Jelszó">
            <input class="btn" type="submit" name="felv-btn" value="Ügyfél felvételte">
        </form>
    </div>
    <div class="vonal"></div>
    <div class="add-money">
        <h2>Pénz feltöltése</h2>
        <form action="admin.php" method="post">
            <select name="ember-szamlaszam">
                    <option value="">Szamlaszam</option>
            </select>
            <input type="number" name="ertek" placeholder="Ft">
            <input class="btn" type="submit" name="up-btn" value="Feltöltés">
        </form>
    </div>
</body>
</html>
