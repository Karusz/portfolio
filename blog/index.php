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
  <link rel="stylesheet" href="asstes/css/index-style.css">
</head>
<body>
  <!-- NAVBAR START -->
  <div id="navbar"></div>
  <!-- NAVBAR END-->
  <div class="content container">
    <div class="about">
      <div class="text-center">
        <img src="asstes/img/profilkep.jpg" class="mx-auto" alt="">
      </div>
      <div class="about-text">
        <h2 class="text-center">Nev</h2>
        <h5>Rovid leiras:</h5>
        <p class="text-break lh-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div>

    <!-- POST CARD START -->
    <div class="post d-flex">
      <div class="post-card">
        <img src="..." class="card-img-top" alt="Post thumbnail">
        <div class="card-body">
          <h5 class="card-title">Post</h5>
          <p class="card-text">Postbol par sor</p>
        </div>
      </div>
      <div class="post-card">
        <img src="..." class="card-img-top" alt="Post thumbnail">
        <div class="card-body">
          <h5 class="card-title">Post</h5>
          <p class="card-text">Postbol par sor</p>
        </div>
      </div>
    </div>
    <!-- POST CARD END -->
    
  </div>
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
