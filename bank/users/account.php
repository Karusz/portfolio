<?php
  require "../assets/php/config.php";
  require "../assets/php/functions.php";

  $id = $_SESSION['id'];
  $lekerd=" SELECT * FROM users WHERE id= $id";
  $talalt= $conn->query($lekerd);
  $user = $talalt->fetch_assoc();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/1316779f14.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../assets/css/all-style.css">
    <link rel="stylesheet" href="../assets/css/account.css">
  </head>
  <body>
    <header>
      <div class="superNav border-bottom py-2 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
              <select  class="me-3 border-0 bg-light">
                <option value="hun-hu">HUN - HU</option>
              </select>
              <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>email@valami.com</strong></span>
              <span class="me-3"><i class="fa-solid fa-phone me-1 text-warning"></i> <strong>36-70-123-1234</strong></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
              <span class="me-3 ligth" id="light">
                <button class="theme-btn light" onclick="lightTheme()"><i class="fa-solid fa-sun fa-xl"></i></button>
              </span>
              <span class="me-3 ligth" id="dark">
                <button class="theme-btn dark" onclick="darkTheme()"><i class="fa-solid fa-moon fa-xl"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="#"><i class="fa-solid fa-vault fa-l"></i> <strong>Bank</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="account.php">Saját számla</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="cards.php">Bankkártyák</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="atm.php">ATM</a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-uppercase" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Utalás
                    </button>
                    <ul class="dropdown-menu text-uppercase">
                      <li><a class="dropdown-item mx-2" href="outbank.php">Bankon kívül</a></li>
                      <li><a class="dropdown-item mx-2" href="inbank.php">Bankon belül</a></li>
                    </ul>
                  </div>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="../assets/php/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl"></i></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div class="user_data container text-center p-3">
        <p>Udv, <strong><?= $user['name']?></strong></p>
        <p>Szamlaszam: <?=$user['card_number']?></p>
      </div> 
      <div class="card_data container row p-3">
        <?php
          $card_id = $user['card_id'];
          $lekerd = "SELECT * FROM cards WHERE id= $card_id";
          $talalt = $conn->query($lekerd);
          $user_card = $talalt->fetch_assoc();
        
        ?>
        <div class="col-xl-12 p-2 card text-center">
          <a href="#"><img src="../<?=$user_card['img']?>" class="card-img-top" alt="MastercardCard"></a>
          <div class="card-body">
            <h5 class="card-title"><?=$user_card['type']?></h5>
            <p class="card-text"><?=$user['money']?> Ft</p>
          </div>
        </div>
        

        <div class="col-xl-12">
          <div class="money_trans_word text-center">
          <?php
          $lekerd = "SELECT * FROM transfers WHERE user_id = $id";
          $talalt = $conn->query($lekerd);
          while($transfer= $talalt->fetch_assoc()){
            if($transfer['in_or_out'] == 1){
          ?>
            <p class="plus"><?=$transfer['date']?> - <?=$transfer['name']?> - <?=$transfer['money']?> Ft | <a href="#"><i class="fa-solid fa-arrow-right-arrow-left"></i></a></p>
            <?php } else{?>
            <p class="minus"><?=$transfer['date']?>  - <?=$transfer['name']?> - <?=$transfer['money']?> Ft | <a href="#"><i class="fa-solid fa-arrow-right-arrow-left"></i></a></p>
          <?php 
              }
            }
          ?>
          </div>
        </div>
      </div>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/main.js"></script>

  </body>
</html>