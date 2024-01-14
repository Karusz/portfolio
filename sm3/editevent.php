<?php

    require "config.php";
    $eventid = $_GET['eventid'];

    if(isset($_POST['kosar-btn'])){
        echo "<script>alert('NEM!')</script>";
    }

    if(isset($_POST['letrehoz-btn'])){
        $conn->query("INSERT INTO tickets VALUES(id, $eventid, '$_POST[type]', $_POST[ar], $_POST[db])");
    }
    

    

    $lekerd = "SELECT * FROM events WHERE id=$eventid";
    $talalt = $conn->query($lekerd);
    $event = $talalt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">

    <title>FŐOLDAL</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    </head>
    <body>
    <div class="nav" id="nav"></div>

        <div class="esemeny">
            <h1><?= $event["name"]?></h1>
            <p><?= $event["time"]?></p>
            <p><?= $event["location"]?></p>
            <br>
            <hr>
        </div>
        <form action="editevent.php?eventid=<?= $eventid?>" method="post">
            <input class="kozep" type="text" name="type" placeholder="Tipusa">
            <input class="kozep" type="text" name="ar" placeholder="Ar">
            <input class="kozep" type="text" name="db" placeholder="Darab">
            <input class="kozep" type="submit" name="letrehoz-btn" value="Jegy letrehozasa">
        </form>
        <hr>

        <form action="event.php?eventid=<?=$eventid?>" method="post">
        <?php
            $lekerd = "SELECT * FROM tickets WHERE eventid=$eventid";
            $talalt = $conn->query($lekerd);
            while ($ticket=$talalt->fetch_assoc()) {
        ?>
            <fieldset class="jegy">
                <input class="jobb" name="kosar-btn" type="submit" value="Kosárba">
                <input type="number" name="db" id="db" value="1">
                <label class="bal"><?= $ticket["type"]?></label>
                <label class="jobb"><?=$ticket["ar"]?> Ft</label>
            </fieldset>
        <?php } ?>
        </form>
    </body>
</html>
<script>
    $("#nav").load("nav.php");
</script>