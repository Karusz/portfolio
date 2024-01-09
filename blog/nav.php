<?php

    echo '<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid justify-content-between">
      <div class="d-flex">
        <a class="navbar-brand me-2 mb-1 d-flex align-items-center" style="color: white;" href="#">
          <img src="" alt="Logo">
        </a>
      </div>
      <ul class="navbar-nav flex-row d-none d-md-flex">
        <li class="nav-item me-3 me-lg-1 active">
          <a class="nav-link" href="index.php"><span>Kezdolap</i></span></a>
        </li>
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="posts.php"><span>Posztok</span></a>
        </li>
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="contact.php"><span>Kapcsolat</span></a>
        </li>
      </ul>
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link d-sm-flex align-items-sm-center" href="login.php">
            <button class="d-none d-sm-block ms-1 nav-btn">Bejelentkezes</button>
          </a>
        </li>
      </ul>
    </div>
  </nav>';

?>