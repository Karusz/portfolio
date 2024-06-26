<?php
    require "assets/php/config.php";
    require "assets/php/functions.php";

    if(isset($_POST['kuld-btn'])){
        $email = $_POST['email'];
        $text = $_POST['text'];
        Kapcsolat($email, $text);
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/kap-style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="nav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Kezdolap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allpost.php">Posztok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Kapcsolat</a>
                </li>
                <?php if(empty($_SESSION['id'])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Bejelentkezes</a>
                </li>
                <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assets/php/logout.php">Kijelentkezés</a>
                    </li>
                <?php }?>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <div class="container mt-3">
        <div class="container d-flex justify-content-center text-center">
            <form class="kap-container" method="post" action="kapcsolat.php">
                <div>
                    <h3>Kapcsolat</h3>
                </div>
                <div class="mb-3">
                  <label class="form-label d-flex justify-content-start">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label d-flex justify-content-start">Üzenet</label>
                  <textarea name="text" name="text" class="form-control"></textarea>
                </div>
                <button type="submit" name="kuld-btn" class="btn btn-primary">Elküldés</button>
            </form>
        </div>
    </div>
</body>
</html>


