<?php

  require "config.php";
  if(isset($_POST["kuld-btn"])){
    $conn->query("INSERT INTO messages VALUES(id, '$_POST[email]', '$_POST[text]')");
    echo '<script>alert("Üzenet elküldve!")</script>';
  }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="asstes/bootstrap/js/bootstrap.min.js"></script>
    <script src="asstes/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asstes/js/main.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="asstes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asstes/css/all-style.css">
    <link rel="stylesheet" href="asstes/css/contact-style.css">
</head>
<body>
    <!-- NAVBAR START -->
    <div id="navbar"></div>
    <!-- NAVBAR END-->
    <div class="content container justify-content-center">
      <div>
        <p> Itt tudod felvenni velem a kapcsolatot. A válaszomat majd email formában fogod megkapni.</p>
      </div>
      <div class="form-container">
        <h2>Kapcsolatfelvétel</h2>
        <form action="contact.php" method="post">
          <label>Email címed:</label>
          <input type="email" name="email" placeholder="Email" required>
          <label>Szöveg:</label>
          <input type="text" name="text" placeholder="Szöveg" required>
          <input type="submit" name="kuld-btn" value="Küldés">
        </form>
      </div>  
    </div>
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
