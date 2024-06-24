<?php
    require "assets/php/config.php";

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
    <link rel="stylesheet" href="assets/css/index-style.css">
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
                    <a class="nav-link active" aria-current="page" href="#">Kezdolap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allpost.php">Posztok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kapcsolat.php">Kapcsolat</a>
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
    <div class="container-fluid">
        <div class="mt-3">
            <div class="pics d-flex justify-content-center">
                <img class="img-thumbnail" src="" alt="picture of me">
            </div>
            <div class="about text-center container mt-3">
                <h4>Nev</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
        <div class="pt-3 newpostbg">
            <div class="text-center">
                <h3>Új posztok</h3>
            </div>
            <div class="post d-flex  justify-content-center text-center mt-3 row">
                <?php
                    $lekerd = "SELECT * FROM posts LIMIT 5";
                    $talalt = $conn->query($lekerd);
                    while($post = $talalt->fetch_assoc()){

                    
                ?>
                <div class="card">
                    <div class="img"><img src="assets/img/<?=$post['thumbnail']?>" alt=""></div>
                    <div class="title"><?=$post['name']?></div>
                    <div class="short"><?=$post['short_text']?></div>
                    <button class="btn btn-tov"><a href="post.php?id=<?=$post['id']?>">Tovább</a></button>
                    <div class="date">
                        <?=$post['date']?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>

