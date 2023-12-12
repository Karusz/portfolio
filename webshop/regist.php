<?php
    require "config.php";
    require "function.php";

    if(isset($_POST['reg-btn'])){
        if($_POST['password'] == $_POST['repassword']){
            Reg($_POST['username'], $_POST['email'], $_POST['password']);
        }else{
            echo '<script>alert("Nem ugyan az a jelszó")</script>';
        }
        
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
            <form action="regist.php" method="post">
                <h3>Regisztráció</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" name="username" class="form-control" placeholder="Felhasznalonev">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" name="password" class="form-control" placeholder="Jelszo">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" name="repassword" class="form-control" placeholder="Jelszo Ujra">
                </div>
                <div>
                    <input type="submit" name="reg-btn" value="Regisztráció">
                </div>
            </form>
        </div>
    </div>
</body>
</html>