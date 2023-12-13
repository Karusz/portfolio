<?php
    require 'function.php';

    if (isset($_POST['regist-btn'])) {
        if ($_POST['regpassword'] == $_POST['regrepassword']) {
            $name = $_POST['regname'];
            $email =$_POST['regemail'];
            $password = $_POST['regpassword'];
            Reg($name, $email, $password);
        }
    }

    if (isset($_POST['login-btn'])) {
            $email =$_POST['email'];
            $password = $_POST['password'];
        Login($email, $password);
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
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>
<body>
    <main>
        <div class="container" id="container">
            <div class="form-container sing-up">
                <form action="account.php" method="post">
                    <h1>Regisztracio</h1>
                    <input type="text" name="regname" placeholder="Felhasznalonev">
                    <input type="email" name="regemail" placeholder="Email">
                    <input type="password" name="regpassword" placeholder="Jelszo">
                    <input type="password" name="regrepassword" placeholder="Jelszo ujra">
                    <input type="submit" name="regist-btn" value="Regisztracio">
                </form>
            </div>
            <div class="form-container sing-in">
                
                <form action="account.php" method="post">
                    <h1>Bejelentkezes</h1>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Jelszo">
                    <input type="submit" name="login-btn" value="Bejelentkezes">
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Van mar fiokod?</h1>
                        <p>Jelentkezz be!</p>
                        <button class="hidden" id="login">Bejelentkezes</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Nincs meg fiokod?</h1>
                        <p>Regisztralj be!</p>
                        <button class="hidden" id="regist">Regisztracio</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="assets/js/main.js"></script>
</body>
</html>