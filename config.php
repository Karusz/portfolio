<?php
    $conn = new mysqli("localhost", "root", "", "webshop");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
?>