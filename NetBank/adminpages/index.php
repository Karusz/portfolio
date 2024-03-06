<?php
    require "../config.php";
    $lekerd = "SELECT * FROM users";
    $talalt = $conn->query($lekerd);
    $ember = $talalt->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ügyfél keresése</title>

    <link rel="stylesheet" href="../css/all-style.css">
    <link rel="stylesheet" href="css/index.css">

    <!-- AJAX -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
    <header>
        <ul class="navbar">
            <li><a href="newcustomer.php">Új ügyfél</a></li>
            <li><a href="index.php">Ügyfél kereső</a></li>
        </ul>
    </header>
    <main>
        <div class="filter">
            <h3>Kereső</h3>
            <input type="text" name="kereso" id="kereso" placeholder="Keresés">
        </div>
        <div class=vonal></div>
        <div class="filter-content">
            <h2>Ügyfél:</h2>
            <div id="ugyfelek">
                <?php
                    $lekerd = "SELECT * FROM users";
                    $talalt = $conn->query($lekerd);
                    while ($ugyf = $talalt->fetch_assoc()) {
                        echo '<h3><a href="szamla.php?code='.$ugyf['azonosito'].'">'.$ugyf['vnev'].' '.$ugyf['knev'].'</a></h3>';
                    }
                
                ?>
            </div>
        </div>
    </main>
    
    <script>
	    document.getElementById('kereso').addEventListener('keyup', (e)=>{
		    const adat = e.target.value.toLowerCase();
		    $("#ugyfelek").load("findmember.php?find="+adat);
	    });
    </script>

</body>
</html>