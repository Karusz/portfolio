<?php
    session_start();

    if(empty($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
	
    if(!empty($_GET['cuponid'])){
        $cuponid = $_GET['cuponid'];
        $conn = new mysqli("localhost", "root", "", "webshop");

        $conn->query("DELETE FROM cupons WHERE id=$cuponid");
        header("Location: adminpages/kuponok.php");
    }

    if(!empty($_GET['adminid'])){
        $adminid = $_GET['adminid'];
        $conn = new mysqli("localhost", "root", "", "webshop");

        $conn->query("DELETE FROM admins WHERE id=$adminid");
        header("Location: adminpages/felhasznalok.php");
    }

    function AddCart($id){//Ha ugyan az az id, akkor csak novelje meg a db szamot
		array_push($_SESSION['cart'], array($id));
        header('Location: index.php');
	}

    function RemoveCart($id){
        unset($_SESSION['cart'][$id]);
    }
    
    function NewOrder($pay, $telefon, $email, $vnev, $knev, $utca, $hazsz, $iranyitosz, $varos, $emelet, $csengo, $lepcsohaz, $uzenetafutarnak){
        $conn = new mysqli("localhost", "root", "", "webshop");

		if (count($_SESSION['cart']) != 0) {
            $date = date("Y-m-d H:i:s");
			$termekek = "";
            $paycount = 0;
			$payprice = 0;
            $address = $iranyitosz." ".$varos." ".$utca." ".$hazsz." ".$emelet." ".$csengo." ".$lepcsohaz;
            $order_name = $vnev." ".$knev;
            //utanvetel fizetes
            if ($pay == 'utanvetel') {
                $payprice +=200;
            }
            $paycount += $payprice;


			foreach ($_SESSION['cart'] as $csomag) {
				$lekerd = "SELECT * FROM products WHERE id=$csomag[0]";
				$talalt = $conn->query($lekerd);
				$termek = $talalt->fetch_assoc();

				if ($termek['on_sale'] == 0) {
					$paycount += $termek['price']*$csomag[0];
				}else{
					$paycount += $termek['sale_price']*$csomag[0];
				}
                $termekek .= $csomag[0]."-".$csomag[1].";";
                
				
			}

			$azonosito = AzonositoGeneralas(5);
			while(mysqli_num_rows($kodok = $conn->query("SELECT * FROM orders WHERE code='$azonosito'")) == 1){
				$azonosito = AzonositoGeneralas(5);
			}
            $conn->query("INSERT INTO checks VALUES(id, '$azonosito', '$termekek','$payprice','$paycount')");
            
			$conn->query("INSERT INTO orders VALUES(id,'$azonosito','$termekek','$email','$telefon','$order_name','$address','$uzenetafutarnak','$pay','$paycount','$date','pending')");


			echo "<script>alert('A rendelésed azonosítúja: $azonosito')</script>";
			$_SESSION['cart'] = array();

		}else{
			echo "<script>alert('Üres a kosarad!')</script>";
		}
    }

    function Reg($name, $email, $password){
        $conn = new mysqli("localhost", "root", "", "webshop");

        $hashcode = password_hash($password,PASSWORD_BCRYPT);

        $lekerd = "SELECT * FROM users WHERE email='$email'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 0){

            $lekerd = "SELECT * FROM users WHERE name='$name'";
            $talalt = $conn->query($lekerd);

            if (mysqli_num_rows($talalt) == 0) {
                $conn->query("INSERT INTO users VALUES(id, '$name', '$email', '$hashcode')");
            }else {
                echo '<script>alert("Van már ilyen felhasznalonev!")</script>';
            }

        }else{
            echo '<script>alert("Van már ilyen email!")</script>';
        }
    }

    function Login($email, $password){
        $conn = new mysqli("localhost", "root", "", "webshop");

        $lekerd = "SELECT * FROM users WHERE email='$email'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 1){
            $felhasznalo = $talalt->fetch_assoc();
            $hash = $felhasznalo['passhash'];
            if(password_verify($password,$hash)){

                $_SESSION['id'] = $felhasznalo['id'];

                header("Location: cart.php");
                

            }else {
                echo '<script>alert("Nem jó az email cim vagy a jelszó!")</script>';
            }
        }else {
            echo '<script>alert("Nem jó az email cim vagy a jelszó!")</script>';
        }
    }

    function AddAdmin($name){
        $conn = new mysqli("localhost", "root", "", "webshop");

        $lekerd = "SELECT * FROM users WHERE name='$name'";
        $talalt = $conn->query($lekerd);
        $user = $talalt->fetch_assoc();

        $lekerdadmin = "SELECT * FROM admins WHERE username='$name'";
        $talaltadmin = $conn->query($lekerdadmin);
        $admin = $talaltadmin->fetch_assoc();

        if (empty($admin['user_id'])) {
            $conn->query("INSERT INTO admins VALUES(id, $user[id], '$name')");
        }else{
            echo '<script>alert("mar admin a felhasznalo!")</script>';
        }

    }

    function ProductFeltolt($name,$meret,$ar,$file_name){
        $conn = new mysqli("localhost", "root", "", "webshop");

        $lekerd = "SELECT * FROM products WHERE name='$name'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 0){

            $conn->query("INSERT INTO products VALUES(id, '$name','$meret','$ar',0,0,0,'$file_name')");
            echo "<script>alert('Fájl sikeresen feltöltve!')</script>";

        }else{
            echo '<script>alert("Van mar ilyen nevu termek!")</script>';
        }
    }


    function AzonositoGeneralas($hossz){
		$betuk = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$betuhosszusag = strlen($betuk);
		$generalt_kod = "";
		for($i = 0; $i < $hossz; $i++){
			$generalt_kod .= $betuk[random_int(0, $betuhosszusag-1)];
		}
		return $generalt_kod;
	}

    function NewCupon($db, $hasz, $ert){
		$conn = new mysqli("localhost", "root", "", "webshop");
		for($i = 0; $i < $db; $i++){
			$kod = AzonositoGeneralas(10);
			while(mysqli_num_rows($kodok = $conn->query("SELECT * FROM cupons WHERE code = '$kod'")) == 1){
				$kod = AzonositoGeneralas(10);
			}
			$conn->query("INSERT INTO cupons VALUES(id, '$kod', $ert, $hasz)");
		}
	}

    
?>
