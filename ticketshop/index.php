<?php
    session_start();
    require "config.php";
    
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
        <?php

            //Event
            $lekerd = "SELECT * FROM events";
            $talalt = $conn->query($lekerd);
            while($event = $talalt->fetch_assoc()){
                $id = $event['id'];
                if($_SESSION['id'] != $event['userid']){
                    echo '<form action="event.php?eventid='.$id.'" method="post">
                        <fieldset class="jegy">
                            <input class="jobb" type="submit" value="Megnézem">
                            <label class="bal"><strong>'.$event["name"].'</strong></label>
                        </fieldset>
                    </form>';
                }else{
                    echo '<form action="editevent.php?eventid='.$id.'" method="post">
                        <fieldset class="jegy">
                            <input class="jobb" type="submit" value="Szerkesztes">
                            <label class="bal"><strong>'.$event["name"].'</strong></label>
                        </fieldset>
                    </form>';
                }}
        ?>
    </body>
</html>
<script>
    $("#nav").load("nav.php");
</script>