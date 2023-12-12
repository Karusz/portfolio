<?php
    require "function.php";

    if(isset($_POST['login-btn'])){
        Login($_POST['username'], $_POST['password']);
    }


?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/login-reg-style.css">

    <!-- SCRIPT -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="inner">
            <form action="login.php" method="post">
                <h3>Bejelentkezés</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" name="username" placeholder="Felhasználónév">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" name="password" placeholder="Jelszó">
                </div>
                <div>
                    <input type="submit" name="login-btn" value="Bejelentkezés">
                </div>
                <div class="reg">
                    <p>Nincs meg fiokod? <a href="">Regisztracio</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>