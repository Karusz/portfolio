<?php
    session_start();
    require 'config.php';

    if(!empty($_SESSION['id'])){
        $userid = $_SESSION['id'];
        $lekerd = 'SELECT * FROM admins WHERE user_id='.$userid;
        $talalt = $conn->query($lekerd);
    
        echo '<nav class="navbar" id="nav">
        <span style="font-size:30px; color: red;">Webshop</span>
        <ul class="menu">
            <li ><a href="index.php">Kezdolap</a></li>
            <li><a href="allproducts.php">Termekek</a></li>';
        if(mysqli_num_rows($talalt) == 1){
            echo '<li><a href="adminpages/admin.php">Admin</a></li>';
        }    
        echo'
                <li><a href="logout.php">Kijelentkezes</a></li>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping">'.count($_SESSION['cart']).'</i></a></li>
            </ul>
        </nav>';
    }else{
        echo '<nav class="navbar" id="nav">
        <span style="font-size:30px; color: red;">Webshop</span>
        <ul class="menu">
            <li><a href="index.php">Kezdolap</a></li>
            <li><a href="allproducts.php">Termekek</a></li>
            <li><a href="account.php">Fiok</a></li>
            <li><a href="cart.php"><i class="fa-solid fa-cart-shopping">'.count($_SESSION['cart']).'</i></a></li>
        </ul>
    </nav>';
    }
    
    
    
    
?>
