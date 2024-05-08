<?php

    /*if(isset($_COOKIE['user'])){
        header("Location: regist.php");
    }*/

    if(isset($_POST['kosar-btn'])){
        echo "<script>alert('NEM!')</script>";
    }

    require "config.php";

    $eventid = $_GET['eventid'];

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