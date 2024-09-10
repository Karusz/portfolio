<?php
    
    session_start();
	
    function Login($code, $psw){
        $conn = new mysqli("localhost", "root", "", "bank");
        $lekerd = "SELECT * FROM users WHERE login_code='$code'";
        $talat = $conn->query($lekerd);

        if(mysqli_num_rows($talat) == 1){
            $user = $talat->fetch_assoc();

            if($user['psw'] == $psw){
                $_SESSION['id'] = $user['id'];
                header("location: users/account.php");
            }else{
                //Helytelen jelszo
            }
        }else{
            //Helytelen azonosito
        }
    }

?>