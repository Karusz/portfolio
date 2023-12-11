<?php

    function Reg($username, $email, $password){
        $conn = new mysqli("localhost", "root", "", "webshop");

        $hashcode = password_hash($password,PASSWORD_BCRYPT);

        $lekerd = "SELECT * FROM users WHERE username='$username'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 0){

            $conn->query("INSERT INTO users VALUES(id, '$username', '$email', '$hashcode')");

        }else{
            echo '<script>alert("Van már ilyen felhasznaló")</script>';
        }
    }

    function Login($username, $password){
        $conn = new mysqli("localhost", "root", "", "webshop");

        $lekerd = "SELECT * FROM users WHERE username='$username'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 1){
            $felhasznalo = $talalt->fetch_assoc();
            $hash = $felhasznalo['passhash'];
            if(password_verify($password,$hash)){

                //header("Location: cart.php");
                echo '<script>alert("Siker!")</script>';

            }else {
                echo '<script>alert("Nem jó a felhasználonév vagy a jelszó!")</script>';
            }
        }else {
            echo '<script>alert("Nem jó a felhasználonév vagy a jelszó!")</script>';
        }
    }

?>