<?php
    session_start();
    require 'config.php';

    if(!empty($_SESSION['id'])){
        $userid = $_SESSION['id'];
        $lekerd = 'SELECT * FROM admins WHERE user_id='.$userid;
        $talalt = $conn->query($lekerd);
    
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
            <span style="font-size:30px;cursor:pointer; color: red;" onclick="openNav()">&#9776; Webshop</span>
            
        <!-- SIDENAV END -->
        <ul class="menu">
            <li ><a href="index.php">Kezdolap</a></li>';
        if(mysqli_num_rows($talalt) == 1){
            echo '<li><a href="adminpages/admin.php">Admin</a></li>';
        }    
        echo'
                <li><a href="logout.php">Kijelentkezes</a></li>
                <li><a href="cart.html"><i class="fa-solid fa-cart-shopping" id="number"></i></a></li>
            </ul>
        </nav>';
    }else{
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
            <span style="font-size:30px;cursor:pointer; color: red;" onclick="openNav()">&#9776; Webshop</span>
        <!-- SIDENAV END -->
        <ul class="menu">
            <li ><a href="index.php">Kezdolap</a></li>
            <li><a href="account.php">Fiok</a></li>
            <li><a href="cart.html"><i class="fa-solid fa-cart-shopping" id="number"></i></a></li>
        </ul>
    </nav>';
    }
    
    
    
?>
