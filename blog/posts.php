<?php
  require "config.php";
  session_start();

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
    <link rel="stylesheet" href="asstes/css/allposts-style.css">
</head>
<body>
    <!-- NAVBAR START -->
    <div id="navbar"></div>
    <!-- NAVBAR END-->
    <div class="content container ">
        <div class="row post">
          <?php
          $lekerd = "SELECT * FROM posts ORDER BY id DESC";
          $talalt = $conn->query($lekerd);
          while ($post=$talalt->fetch_assoc()) {
            
          
          ?>
          <div class="col-3">
            <img src="asstes/img/<?=$post['thumbnail']?>" alt="">
          </div>
          <div class="col-9">
              <h2><?=$post['name']?></h2>
              <p><?= $post['short_text']?></p>
              <button><a href="post.php?postid=<?=$post['id']?>">Tovabb</a></button>
          </div>
          <?php }?>
        </div>
      
      
    </div>
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
