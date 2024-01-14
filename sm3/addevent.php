<?php
    session_start();
    require "config.php";
    
    if(isset($_POST['event-btn'])){
        $conn->query("INSERT INTO events VALUES(id, $_SESSION[id], '$_POST[name]', '$_POST[cim]','$_POST[datum]')");
        header("Location: index.php");
    }
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">

    <title>FŐOLDAL</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/regist.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    </head>
    <body>
        <div class="nav" id="nav"></div>
       
        <form action="addevent.php" method="post">
             <!-- EVENT -->
            <input type="text" name="name" placeholder="Esemény neve">
            <input type="text" name="datum" placeholder="Esemény dátuma">
            <input type="text" name="cim" placeholder="Esemény címe">
            <input type="submit" name="event-btn" value="Esemény mentése!">
        </form>
    </body>
</html>
<script>
    $("#nav").load("nav.php");
</script>