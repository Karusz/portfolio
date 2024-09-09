<?php
  require "assets/php/functions.php";

  if(isset($_POST["login-btn"])){
    Login($_POST['user_code'], $_POST['psw']);
  }

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

  <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/login-style.css">
  </head>
  <body>
    <header>
      <div class="superNav border-bottom py-2 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
              <select  class="me-3 border-0 bg-light">
                <option value="en-us">EN-US</option>
              </select>
              <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>info@somedomain.com</strong></span>
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
                <a class="nav-link mx-2 text-uppercase" href="index.html">Kezdőlap</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="#">Hírek</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="#">Pénzügyek</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="#">Kapcsolat</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase" href="login.php"></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
        <form action="login.php" method="post">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Bejelentkezés</h3>
                                <div class="form-outline mb-4">
                                  <!-- <label><i class="fa-solid fa-id-card-clip fa-xl"></i></label> -->
                                  <input type="text" name="user_code" class="form-control" placeholder="Azonosító" />
                                    
                                </div>
                                <div class="form-outline mb-4">
                                  <!-- <label ><i class="fa-solid fa-lock fa-xl"></i></label>    -->
                                  <input type="password" name="psw" class="form-control" placeholder="Jelszó"/>
                                    
                                </div>
                                <button class="btn btn-primary " name="login-btn" type="submit">Bejelentkezés</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>