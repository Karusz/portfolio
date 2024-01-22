<?php
    require "config.php";
    session_start();

    if (isset($_POST['log-btn'])) {
        $psw = $_POST['password'];
        $email = $_POST['email'];

        $lekerd = "SELECT * FROM user WHERE email='$email'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 1){
            $user = $talalt->fetch_assoc();

            if ($user['password'] == $psw) {
                $_SESSION['id'] = $user['id'];
                header("location: index.php");
            }else{
                echo '<script>alert("Nem jo a jelszo vagy az email")</script>';
            }
            
        }else{
            echo '<script>alert("Nincs ilyen felhasznalo")</script>';
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
    <link rel="stylesheet" href="asstes/css/login-style.css">
</head>
<body>
    <!-- NAVBAR START -->
    <div id="navbar"></div>
    <!-- NAVBAR END-->
    <div class="content container">
        <div class="login-container">
            <h2>Bejelentkezes</h2>
            <form action="login.php" method="post">
                <label>Email:</label>
                <input type="text" name="email" placeholder="Email">
                <label>Jelszo:</label>
                <input type="password" name="password" placeholder="jelszo">
                <input type="submit" name="log-btn" value="Bejelentkezes">
            </form>
        </div>
    </div>
</body>
</html>
<script>
  $('#navbar').load('nav.php');
</script>
