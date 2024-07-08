<?php
    require "config.php";


    if(isset($_POST['staff-btn'])){
        $poz = $_POST['poz'];
        $img = $_POST['img'];
        $nev = $_POST['nev'];
        $text = $_POST['text'];

        $conn->query("INSERT INTO staffs VALUES(id, '$poz','$img.jpg','$nev','$text')");
    }

    if(isset($_POST['rang-btn'])){
        $name = $_POST['name'];
        $text = $_POST['text'];

        $conn->query("INSERT INTO rangs VALUES(id, '$name', '$text')");

    }


    /*if(isset($_POST['stat-btn'])){
        //Tag
        if(!empty($_POST['tag'])){
            $tag = $_POST['tag'];
        }
        //Bot
        if(!empty($_POST['bot'])){
            $bot = $_POST['bot'];
        }
        //Csatornak
        if(!empty($_POST['csati'])){
            $csati = $_POST['csati'];
        }

        $conn->query("INSERT INTO stat VALUES(id, '$tag', '$bot', '$csati')");
    }*/

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="css/main.css">

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark container-fluid" aria-label="Tenth navbar example">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="img/logotext.png" style="width:50px;"  alt="FoxHole Logo">
                <div class="collapse navbar-collapse justify-content-center" id="navbarsExample08">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="test.php">Kezdőlap</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <h1 class="text-center mt-5">Staff</h1>
        <div class="container-fluid d-flex justify-content-center">
            <form action="admin.php" method="post">
                <input type="text" name="poz" placeholder="Pozicio" class="form-control m-1">
                <input type="text" name="img" placeholder="Kep neve" class="form-control m-1">
                <input type="text" name="nev" placeholder="Nev" class="form-control m-1">
                <textarea name="text" placeholder="Leiras" class="form-control m-1" id="" style="color: black; height: 150px"></textarea>
                <input type="submit" value="Kuldes" name="staff-btn" class="btn btn-primary m-1">
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <h1 class="text-center mt-5">Statisztika</h1>
        <div class="container-fluid d-flex justify-content-center">
            <form action="admin.php" method="post">
                <input type="text" name="tag" placeholder="Tagszam" class="form-control m-1">
                <input type="text" name="bot" placeholder="Botok" class="form-control m-1">
                <input type="text" name="csati text-dark" placeholder="Csatornak" class="form-control m-1">
                <input type="submit" value="Kuldes" name="stat-btn" class="btn btn-primary m-1">
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <h1 class="text-center mt-5">Rangok</h1>
        <div class="container-fluid d-flex justify-content-center">
            <form action="admin.php" method="post">
                <input type="text" name="name" placeholder="Rang Neve" class="form-control m-1">
                <textarea name="text" placeholder="Leiras" class="form-control m-1" id="" style="color: black; height: 150px"></textarea>
                <input type="submit" value="Kuldes" name="rang-btn" class="btn btn-primary m-1">
            </form>
        </div>
    </div>
</body>
</html>