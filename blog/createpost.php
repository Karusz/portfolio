<?php

  require "config.php";

  if(empty($_SESSION['id'])){
    header("Location: index.php");
  }

  if(isset($_POST['post-btn'])){

    $dir = 'asstes/img/postimg/';
    $upload = $dir . basename($_FILES['newfile']['name']);
		if(move_uploaded_file($_FILES['newfile']['tmp_name'], $upload)){
      
      $postname = $_POST['pname'];
      $posttext = $_POST['ptext'];
      $shorttext = $_POST['pshort'];
      $filename = $_FILES['newfile']['name'];

      $conn->query("INSERT INTO posts VALUES(id, '$postname', '$shorttext', '$posttext','$filename')");

      echo "<script>alert('Fájl sikeresen feltöltve!')</script>";



		}else{
      echo "<script>alert('Fájl sikertelen feltöltése!')</script>";
    }
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
  <link rel="stylesheet" href="asstes/css/createpost-style.css">
</head>
<body>
  <!-- NAVBAR START -->
  <div id="navbar"></div>
  <!-- NAVBAR END-->
    <div class="container content ">
        <div class="create-container">
            <h2>Poszt irasa</h2>
            <form action="createpost.php" method="post" enctype="multipart/form-data">
                <label>Name:</label>
                <input type="text" name="pname" placeholder="Name" require>
                <label>Text:</label>
                <input type="text" name="ptext" placeholder="Text" require>
                <label>Short Text:</label>
                <input type="text" name="pshort" placeholder="Short Text" require>
                <label>Thumbnail:</label>
                <input type="file" name="newfile" >
                <input type="submit" name="post-btn" value="Poszt irasa">
                
            </form>
        </div>
    </div>
    
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
