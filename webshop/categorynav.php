<?php
session_start();
require 'config.php';

echo '<span style="font-size:30px; color: red;">SteelCrafters</span>
<ul class="menu">
    <li><a href="index.php">Kezdolap</a></li>
    <li><a href="allproducts.php">Termekek</a></li>
    <li><a href="account.php">Fiok</a></li>
    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping">'.count($_SESSION['cart']).'</i></a></li>
</ul>';

?>