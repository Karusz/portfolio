<?php
echo '<nav class="navbar" id="nav">
        <!-- SIDENAV -->
            <div id="mySidenav" class="sidenav">
                <div class="logo"><h1>Webshop</h1></div>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
            </div>
            <span style="font-size:30px;cursor:pointer; color: red;" onclick="openNav()">&#9776;</span>
        <!-- SIDENAV END -->
        <ul class="menu">
            <li ><a href="index.php">Kezdolap</a></li>
            <li><a href="">Menu 2</a></li>
            <li><a href="">Menu 3</a></li>
            <li><a href="account.php">Fiok</a></li>
            <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
    </nav>';
?>