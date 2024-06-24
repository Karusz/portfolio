<?php
    function Login($email, $psw){
        $conn = new mysqli("localhost", "root", "", "blog");
        $lekerd = "SELECT * FROM admins WHERE email='$email'";
        $talat = $conn->query($lekerd);

        if(mysqli_num_rows($talat) == 1){
            $admin = $talat->fetch_assoc();

            if($admin['psw'] == $psw){
                $_SESSION['id'] = $admin['id'];
                header("location: admin/admin.html");
            }else{
                echo "<script>alert('Helytelen jelszó')</script>";
            }
        }else{
            echo "<script>alert('Helytelen email cím')</script>";
        }
        
    }

?>