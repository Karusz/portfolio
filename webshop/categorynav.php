<?php
session_start();
require 'config.php';

echo '<nav class="navbar" id="nav">
    <!-- SIDENAV
        <div id="mySidenav" class="sidenav">
        <div class="logo"><h1>Webshop</h1></div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
    <span style="font-size:30px; color: red;">Webshop</span>
     SIDENAV END -->
    <ul class="menu">
        <li><a href="index.php">Kezdolap</a></li>
        <li><a href="allproducts.php">Termekek</a></li>
        <li><a href="account.php">Fiok</a></li>
        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping">'.count($_SESSION['cart']).'</i></a></li>
    </ul>
</nav>';

?>