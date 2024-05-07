<?php
    require "config.php";

    $postid = $_GET['id'];

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
  <link rel="stylesheet" href="asstes/css/post-style.css">
</head>
<body>
  <!-- NAVBAR START -->
  <div id="navbar"></div>
  <!-- NAVBAR END-->
  <div class="content container">

    <?php
      $lekerd = "SELECT * FROM posts WHERE id=$postid";
      $talalt = $conn->query($lekerd);
      $post=$talalt->fetch_assoc();
    
    ?>
    <div class="post">
        <img src="asstes/img/postimg/<?=$post['thumbnail']?>" alt="">
        <h1><?=$post['name']?></h1>
        <h4><?=$post['short_text']?></h4>
        <p><?=$post['text']?></p>
    </div>
    
    
  </div>
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
