<?php
session_start();
	
require "config.php";

if(isset($_POST["login-btn"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $lekerdezes = "SELECT * FROM users WHERE email='$email'";
    $talalt_felhasznalok = $conn->query($lekerdezes);
    if(mysqli_num_rows($talalt_felhasznalok) == 1){
        $lekerdezes = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $talalt_felhasznalok = $conn->query($lekerdezes);
        if(mysqli_num_rows($talalt_felhasznalok) == 1){
            $felhasznalo = $talalt_felhasznalok->fetch_assoc();
            $_SESSION['name'] = $felhasznalo['email'];
            $_SESSION['id'] = $felhasznalo['id'];
            header("Location: index.php");
        }
        else{
            echo "<script>alert('Helytelen jelszó!')</script>";
        }
    }
    else{
        echo "<script>alert('Nincs ilyen nevű felhasználó!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/regist.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>
<body>
<div class="nav" id="nav"></div>

    <form method="post" action="login.php">
        <h2>Bejelentkezés</h2>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Jelszó">
        <input type="submit" name="login-btn" value="Bejelentkezés">
    </form>
</body>
</html>
<script>
    $("#nav").load("nav.php");
</script>