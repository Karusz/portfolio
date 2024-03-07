<?php
    require "config.php";

    if(isset($_POST['login-btn'])){
        $code = $_POST['code'];
        $password = $_POST['psw'];

        $lekerd = "SELECT * FROM users WHERE code = '$code'";
        $talalt = $conn->query($lekerd);
        if(mysqli_num_rows($talalt) == 1){
            $customer = $talalt->fetch_assoc();

            if($password == $customer['password']){
                header("Location: szamla.php?code=$customer[code]");
            }else{
                echo "<script>alert('Rossz azonosító vagy jelszó!')</script>";
            }
        }else{
            echo "<script>alert('Rossz azonosító vagy jelszó!')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetBank</title>

    <!-- Css -->
    <link rel="stylesheet" href="css/all-style.css">
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>
    <main>
        <div class="content">
            <form action="" method="post">
                <h1>Bejelentkezés</h1>
                <input type="text" name="code" placeholder="Azonosító" require>
                <input type="password" name="psw" placeholder="Jelszó" require>
                <button  class="btnLogin" name="login-btn">Bejelentkezés</button>
            </form>
        </div>
    </main>
</body>
</html>