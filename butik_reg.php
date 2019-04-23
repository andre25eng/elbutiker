<?php
/*
* PHP version 7
* @category   Elektronik Butiker
* @author     André Englund <andre25eng@gmail.com>
* @license    PHP CC
*/
/* 
error_reporting(E_ALL);
ini_set("display_erroes", 1); 
*/
 
include_once "{$_SERVER["DOCUMENT_ROOT"]}/../config/config-db.inc.php";
session_start();
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El Butiker STHLM</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
</head>
<body class="bodyFix">
    <div id="brbox"><p>nothing to see here</p></div>
    <div class="container">
        <header>
            <div>
                <h1>Elektronik Butiker STHLM</h1>
                <p>Välj butiken som passar dig bäst</p>
            </div>
            <nav>
                <a href="hem.php">Hem</a>
                <a href="butiker.php">Butiker</a>
                <a href="recensioner.php">Recensioner</a>
                <?php 
                if ($_SESSION['loggedin']) {
                    echo "<a href=\"butik_reg.php\" id=\"curent\">Lägg till Butik</a>
                          <a href=\"logut.php\">Log Ut</a>";
                } else {
                    echo "<a href=\"skapa.php\">Skapa Konto</a>
                          <a href=\"login.php\">Log In</a>";
                }
                ?>
            </nav>
        </header>
        <main>
            <div>
                <h2>Regestrera ny butik</h2>
                <form action="#" method="post">
                    <label for="bgrupp">Butik Grupp</label><input id="bgrupp" type="text" name="bgrupp" required><br>
                    <label for="bnamn">Butik Namn</label><input id="bnamn" type="text" name="bnamn" required><br>
                    <label for="recensioner">Resencion</label><textarea type="text" name="recensioner" id="recensioner" cols="30" rows="10" required></textarea><br>
                    <label for="latitude">Latitude</label><input id="latitude" type="text" name="latitude" required><br>
                    <label for="longitude">Longitude</label><input id="longitude" type="text" name="longitude" required><br>
                    <button>Lägg till</button>
                </form>
                <?php
                if (isset($_POST["bgrupp"], $_POST["bnamn"], $_POST["recensioner"], $_POST["latitude"], $_POST["longitude"])) {
                    
                    
                    $bgrupp = filter_input(INPUT_POST, "bgrupp", FILTER_SANITIZE_STRING);
                    $bnamn = filter_input(INPUT_POST, "bnamn", FILTER_SANITIZE_STRING);
                    $recensioner = filter_input(INPUT_POST, "recensioner", FILTER_SANITIZE_STRING);
                    $latitude = filter_input(INPUT_POST, "latitude", FILTER_SANITIZE_STRING);
                    $longitude = filter_input(INPUT_POST, "longitude", FILTER_SANITIZE_STRING);

                    $conn = new mysqli($hostname, $user, $password, $database);

                    if ($conn->connect_error) {
                        die("Kunde inte ansluta till databasrn: " . $conn->connect_error);
                    }

                    $check = "SELECT * FROM admin WHERE anamn = '$_POST[username]'";
                    $rs = mysqli_query($conn, $check);
                    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                    if($data[0] > 1) {
                        echo "<p class=\"animated tada redbox\">Butiken är redan registrerad!</p>";
                    } else {




                        $sql = "INSERT INTO butiker (bgrupp, bnamn, recensioner, latitude, longitude) VALUES ('$bgrupp', '$bnamn', '$recensioner', '$latitude', '$longitude');";
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Något blev fel med sql-satsen: " . $conn->error);
                        } else {
                            echo "<script>alert('Butiken har lagts till!')</script>";
                        }
                    }
                }
                ?>
            </div>
        </main>
    </div>
    <script src="./js/skripts.js"></script>
</body>
</html>