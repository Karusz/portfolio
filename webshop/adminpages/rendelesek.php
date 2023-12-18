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
                    <h1>Rendelesek</h1>
                </div>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <h3>Rendelesek</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Mikor rendelte</th>
                                <th>Code</th>
                                <th>Nev</th>
                                <th>Telefonszam</th>
                                <th>Fizetesi mod</th>
                                <th>Osszeg</th>
                                <th>Statusz</th>
                                <th>Muvelet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <form action="rendelesek.php" method="post">
                                        <!-- <?php if($termek['on_sale']==0){ ?>
                                                    selected
                                                <?php } ?>
                                            <?php if($termek['on_sale']==1){ ?>
                                                    selected
                                                <?php } ?> -->
                                        <select selected="selected" name="product-on-sale">
                                            <option value="0">Statusz</option>
                                            <option value="1">Kiszallitva</option>
                                            <option value="2">Folyamatban</option>
                                            <option value="3">Hiba tortent</option>
                                        </select>
                                        <input type="submit" class="submitbtn" value="Modositas">
                                    </form>
                                </td>
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