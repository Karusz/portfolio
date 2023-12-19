<?php
    require "../config.php";

    $mutat = 'all';

    

    if (isset($_POST['editorder-btn'])) {
        switch ($_POST['order-status']) {
            case '0':
                break;
            case '1':
                $conn->query("UPDATE orders SET status='pending'");
                break;
                
            case '2':
                $conn->query("UPDATE orders SET status='process'");
                break;
            case '3':
                $conn->query("UPDATE orders SET status='completed'");
                break;

            case '4':
                $conn->query("UPDATE orders SET status='failed'");
                break;
            default:
                break;
        }
        $_POST['show'] = 'all';
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
		$mutat = $_POST['show'];
	}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/all-style.css">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS -->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../assets/js/main.js"></script>
</head>

<body>

    <!-- Sidebar -->
    <div id="adminnav">

    </div>
    <!-- End of Sidebar -->
    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Szamlak</h1>
                </div>
                
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <form method="post">
                            <select name="show" selected="selected" onchange="this.form.submit()">
                                <option value="all" 
                                    <?php if($mutat == "all"){ ?>
                                        selected
                                    <?php } ?>
                                    >ALL</option>
                                <option value="completed"
                                    <?php if($mutat == "completed"){ ?>
                                        selected
                                    <?php } ?>
                                >Kiszallitva</option>
                                <option value="process"
                                    <?php if($mutat == "process"){ ?>
                                        selected
                                    <?php } ?>
                                >Kiszallitas alatt</option>
                                <option value="pending"
                                    <?php if($mutat == "pending"){ ?>
                                        selected
                                    <?php } ?>
                                >Csomagolas alatt</option>
                                <option value="failed"
                                    <?php if($mutat == "failed"){ ?>
                                        selected
                                    <?php } ?>
                                >Hibas kiszallitas</option>
                            </select>
                        </form>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Ki rendelte</th>
                                <th>Termekek</th>
                                <th>Ar</th>
                                <th>Kod</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php 
                                if($mutat == "all"){
                                    $lekerdezes = "SELECT * FROM orders ORDER BY id DESC";
                                }
                                else if($mutat == "completed"){
                                    $lekerdezes = "SELECT * FROM orders WHERE status='completed'";
                                }
                                else if($mutat == "process"){
                                    $lekerdezes = "SELECT * FROM orders WHERE status='process'";
                                }
                                else if($mutat == "pending"){
                                    $lekerdezes = "SELECT * FROM orders WHERE status='pending'";
                                }
                                else{
                                    $lekerdezes = "SELECT * FROM orders WHERE status='failed'";
                                }
                                $talalt = $conn->query($lekerdezes);
                                while($rendeles = $talalt->fetch_assoc()){
                            ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } ?>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<script>
    $('#adminnav').load('adminnav.php');
</script>