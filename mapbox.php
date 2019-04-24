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
                    echo "<a href=\"butik_reg.php\" id=\"curent\">Lägg till Butik</a>
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
            <h1>Platser</h1>
            <form class="platser" action="#" method="post">
                <label for="bgrupp">Butik Grupp</label><input id="bgrupp" type="text" name="bgrupp" required>
                <label for="bnamn">Butik Namn</label><input id="bnamn" type="text" name="bnamn" required>
                <label for="recensioner">Resencion</label><textarea type="text" name="recensioner" id="recensioner" cols="30" rows="10" required></textarea>
            </form>
            <button>Lägg till</button>
        </div>
    </div>
    <script src="js/mapbox.js"></script>
</body>
</html>