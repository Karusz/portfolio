<?php
    require "../assets/php/config.php";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all-style.css">
    <link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark p-3 bg-dark" aria-label="Tenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="nav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php">Kezdolap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../allpost.php">Posztok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kapcsolat.php">Kapcsolat</a>
                </li>
                <?php if(empty($_SESSION['id'])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="../login.php">Bejelentkezes</a>
                </li>
                <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin/admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assets/php/logout.php">Kijelentkezés</a>
                    </li>
                <?php }?>
                </ul>
            </div>
        </div>
    </nav>
        <!-- SIDE NAV -->
     </header>
     <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidenav col-">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">Admin Nav</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                    <a href="admin.php" class="nav-link text-white">
                        <i class="fa-solid fa-house"></i>
                        Kezdőlap
                    </a>
                    </li>
                    <li>
                    <a href="messages.php" class="nav-link text-white active" aria-current="page">
                        <i class="fa-solid fa-message"></i>
                        Üzenetek
                    </a>
                    </li>
                    <li>
                    <a href="newpost.php" class="nav-link text-white" >
                        <i class="fa-solid fa-file"></i>
                        Poszt írása
                    </a>
                    </li>
                    <li>
                    <a href="allpost.php" class="nav-link text-white">
                        <i class="fa-solid fa-folder"></i>
                        Posztok
                    </a>
                    </li>
                    <li>
                    <a href="addadmin.php" class="nav-link text-white">
                        <i class="fa-solid fa-user-tie"></i>
                        Admin hozzáadása
                    </a>
                    </li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-10 col-xm-6 container-fluid content">
                
                <div class="bottom-data row">
                    <div class="staticdiv col-">
                        <div class="head">
                            <h3 class="text-center">Üzenetek</h3>
                        </div>
                        <div class="messages mt-2">
                <!-- KITALALAS ALATT  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

