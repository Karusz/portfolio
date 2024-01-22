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
<!-- POST CARD START -->
<?php
      $lekerd = "SELECT * FROM posts";
      $talalt = $conn->query($lekerd);
      while($post = $talalt->fetch_assoc()){
    
    ?>
    <div class="post-content container d-flex">
      <div class="post-card">
        <img src="asstes/img/postimg/<?=$post['thumbnail']?>" class="card-img-top" alt="Post thumbnail">
        <div class="card-body">
          <h5 class="card-title"><?= $post['name']?></h5>
          <p class="card-text"><?= $post['short_text']?></p>
          <a href="post.php?id=<?=$post['id']?>"><button>Tovabb</button></a>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- POST CARD END -->
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
