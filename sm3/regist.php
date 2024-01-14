<?php
    require "config.php";
    if(isset($_POST['reg-btn'])){
        $conn->query("INSERT INTO users VALUES(id, '$_POST[email]', '$_POST[username]','$_POST[password]')");
        header("Location: login.php");
    }
   

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>FŐOLDAL</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/regist.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/086e7cefb3.js" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>


    </head>
    <body>
    <div class="nav" id="nav"></div>

        <!-- REG -->
        
        <form method="post" action="regist.php">
            <h2>Regisztráció</h2>
            <input type="email" id="email" name="email" placeholder="Email">
            <label id="email-check"></label>
            <input type="text" id="username" name="username" placeholder="Felhasználónév">
            <label id="user-check"></label>
            <input type="password" id="password" name="password" placeholder="Jelszó">
            <label><span id="length-check"></span>8 karakter hosszú legyen</label>
            <label><span id="upper-check"></span>minimum 1 nagybetű</label>
            <label><span id="number-check"></span>minimum 1 szám</label>
            <input type="password" id="passwordre" name="passwordre" placeholder="Jelszó újra">
            <input type="checkbox" id="aszf" name="aszf">
            <input type="submit" id="reg-btn" name="reg-btn" value="REGISZTRÁCIÓ">

        </form>
    </body>
</html>
<script>

    function containsUppercase(str){
        return /[A-Z]/.test(str);
    }

    function containsNumber(str){
        return /\d/.test(str);
    }

    //email nézése
    document.getElementById('email').addEventListener('keyup', (e)=>{
        var email = e.target.value.toLowerCase();
        $('#email-check').load('findemail.php?email='+email);
    });

    //Felhasználó nézése
    document.getElementById('username').addEventListener('keyup', (e)=>{
        var user = e.target.value.toLowerCase();
        $('#user-check').load('finduser.php?user='+user);
    });

    document.getElementById('password').addEventListener('keyup', (e)=>{
        var password = document.getElementById("password").value;

        //Hossz vizsgálata
        if(password.length >= 8){
            document.getElementById('length-check').innerHTML = '<i class="fa-solid fa-check"></i> ';
        }
        else{
            document.getElementById('length-check').innerHTML = '';
        }

        //NAGYBETŰ

        if(containsUppercase(password)){
            document.getElementById('upper-check').innerHTML = '<i class="fa-solid fa-check"></i> ';
        }
        else{
            document.getElementById('upper-check').innerHTML = '';
        }

        //Szám

        if(containsNumber(password)){
            document.getElementById('number-check').innerHTML = '<i class="fa-solid fa-check"></i> ';
        }
        else{
            document.getElementById('number-check').innerHTML = '';
        }
    });

    document.getElementById('passwordre').addEventListener('keyup', (e)=>{

        var password = document.getElementById("password").value;
        var passwordre = document.getElementById("passwordre").value;

        var pass_box1 = document.getElementById("password");
        var pass_box2 = document.getElementById("passwordre");

        if(password != passwordre){
            pass_box1.style.border = "2px solid red";
            pass_box2.style.border = "2px solid red";
        }else{
            pass_box1.style.border = "2px solid lime";
            pass_box2.style.border = "2px solid lime";
        }
        if(passwordre == ''){
            pass_box1.style.border = "2px solid #333";
            pass_box2.style.border = "2px solid #333";
        }
    });

</script>
<script>
    $("#nav").load("nav.php");
</script>