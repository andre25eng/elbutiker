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
<html>
<head>
    <meta charset='utf-8' />
    <title>Display a map</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/mapbox.css">
</head>
<body>
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
                    echo "<a href=\"mapbox.php\" id=\"curent\">Lägg till Butik</a>
                          <a href=\"logut.php\">Log Ut</a>";
                } else {
                    echo "<a href=\"skapa.php\">Skapa Konto</a>
                          <a href=\"login.php\">Log In</a>";
                }
                ?>
            </nav>
        </header>
        <div id='map'></div>
        <div class="box">
            <h2>Platser</h2>
            <form class="platser" action="#" method="post">
                <label for="bgrupp">Butik Grupp</label><input id="bgrupp" type="text" name="bgrupp" required>
                <label for="bnamn">Butik Namn</label><input id="bnamn" type="text" name="bnamn" required>
                <label for="recensioner">Resencion</label><textarea type="text" name="recensioner" id="recensioner" cols="30" rows="10" required></textarea>
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
    </div>
    <script src="js/mapbox.js"></script>
</body>
</html>