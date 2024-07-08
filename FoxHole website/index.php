<?php
    require "config.php";

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <!-- WEBOLDAL KÉSZíTŐ: Ezi  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoxHole</title>
    <meta name="description" content="Magyar Discord szerver">
    <meta name="">
    <meta name="google-site-verification" content="Ou1wWwcoy_aHtJRzPQfo-DOnHggeCMeISZuyLX7SZ7c"/>
    


    <!-- JS -->
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
                            <a class="nav-link" href="#">Kezdőlap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#channels">Csatornák</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#stats">Statisztika</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Tagok</a>
                            <ul class="dropdown-menu dropdown-menu-dark " aria-labelledby="dropdown08">
                            <li><a class="dropdown-item" href="#staff">Vezetőség</a></li>
                            <li><a class="dropdown-item" href="#rangs">Egyéb rangok</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link">FoxHole | Discord Szervere</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid mt-5 row text-white">
        <div class="col-xxl-2"></div>
        <div class="p-5 col-xxl-4 col-md-6">
            <h2 class="text-center">Foxhole Discord Server</h2>
            <p class="text-justify">Amennyiben unatkozol vagy csak beszélgetni szeretnél, akkor várunk sok szeretettel a szerverünkre. Reményeink szerint nem fogod megbánni a csatlakozást, hiszen jó és összetartó közösség vagyunk, és mindenkit meghallgatunk. Csak akkor pingelünk, ha tényleg fontos valami, így nem kell idegeskedned, hogy minen héten 6x kapsz pinget a szerverről. Igaz van hírek csatornánk, viszont külön álló rangot vehetsz fel, ha értesülni szeretnér róluk. <br> Reméljük nem fogod megbánni a csatlakozásodat!</p>
            <button class="btn btn-primary btn-end"><a href="https://discord.gg/tqNp8AG7Fs" class="csati">Csatlakozás</a></button>
        </div>
        <div class="p-5 col-xxl-4 col-md-6 d-flex justify-content-center">
            <img src="img/logo.png" alt="Logo">
        </div>
        <div class="col-xxl-2"></div>
    </div>
    <div class="container-fluid bg-orange" id="channels">
        <h2 class="text-center pt-5">Csatornák</h2>
        <p class="text-center text-breake ms-5 me-5">Próbálkoztunk minél kompaktabban létrehozni a csatornákat, hogy ne kelljen sokat görgetned a discordon belül, és csak azokat lásd, amik érdekelnek Téged.</p>
        <div class="row d-flex justify-content-center">
            <div class="col m-3">
                <img src="img/info.png" alt="info">
            </div>
            <div class="col m-3">
                <img src="img/chat.png" alt="chat">
            </div>
            <div class="col m-3">
                <img src="img/vcpart.png" alt="vc partner">
            </div>
            <div class="col m-3">
                <img src="img/eventfilm.png" alt="event Film">
            </div>
        </div>
    </div>
    <!-- STAFF -->
    <div class="text-center container" id="staff">
        <h3 class="mt-5 text-center">Vezetőség</h3>
        <div class="row d-flex justify-content-center">
            <?php
                $lekerd = "SELECT * FROM staffs";
                $talalt = $conn->query($lekerd);
                while($staff = $talalt->fetch_assoc()){  
            ?>
            <div class="col-md-3 m-4">
                <div class="card dc">
                    <img src="img/<?=$staff['img']?>" class="card-img-top" alt="...">
                    <div class="card-header"><?= $staff['pozicio']?></div>
                    <div class="card-body">
                        <h5 class="card-title"><?=$staff['nev']?></h5>
                        <p class="card-text"><?=$staff['leiras']?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
    <!-- STAT -->
    <div class="stats bg-orange container-fluid text-center" id="stats">
        <h2 class="pt-5">Statisztika</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 m-4">
                <div class="card dc">
                    <div class="card-body">
                        <h5 class="card-title">Tagok</h5>
                        <p class="card-text">51 Felhasználó jelenleg</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m-4">
                <div class="card dc">
                    <div class="card-body">
                        <h5 class="card-title">Botok</h5>
                        <p class="card-text">Disboard | Fibo | ProBot | TempVoice</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m-4">
                <div class="card dc" >
                    <div class="card-body">
                        <h5 class="card-title">Csatornák</h5>
                        <p class="card-text">32 Csatorna | 22 Szöveges | 4 Hang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- RANGS -->
    <div class=" container-fluid" id="rangs">
        <div class="text-center container" >
            <h3 class="text-center mt-5">Egyéb Rangok</h3>
            <div class="row d-flex justify-content-center">
                <?php
                    $lekerd = $conn->query("SELECT * FROM rangs");
                    while($rang = $lekerd->fetch_assoc()){
                ?>
                <div class="col-md-3 m-4">
                    <div class="card dc">
                        <div class="card-body">
                            <h5 class="card-title"><?=$rang['name']?></h5>
                            <p class="card-text"><?=$rang['text']?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="pt-3 mt-3 container-fluid pb-2">
        <ul class="nav justify-content-center border-bottom pb-2 pt-3">
            <li class="nav-item"><a href="#" class="nav-link foot-nav px-2">Kezdőlap</a></li>
            <li class="nav-item"><a href="#" class="nav-link foot-nav px-2">Csatornák</a></li>
            <li class="nav-item"><a href="#" class="nav-link foot-nav px-2">Statisztika</a></li>
            <li class="nav-item"><a href="#" class="nav-link foot-nav px-2">Vezetőség</a></li>
            <li class="nav-item"><a href="#" class="nav-link foot-nav px-2">Rangok</a></li>
        </ul>
        <p class="text-center text-muted pt-3">© 2024 FoxHole | Minden jog fentartva</p>
    </footer>



    
    <script src="js/main.js"></script>
</body>
</html>