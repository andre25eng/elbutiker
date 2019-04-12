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
</head>
<body>
    <div id="brbox"><p>nothing to see here</p></div>
    <div class="container">
        <header>
            <div>
                <h1>Elektronik Butiker STHLM</h1>
                <p>Välj butiken som passar dig bäst</p>
            </div>
            <nav>
                <a href="hem.php">Hem</a>
                <a href="butiker.php" id="curent">Butiker</a>
                <a href="recensioner.php">Recensioner</a>
                <?php 
                if ($_SESSION['loggedin']) {
                    echo "<a href=\"butik_reg.php\">Lägg till Butik</a>
                          <a href=\"logut.php\">Log Ut</a>";
                } else {
                    echo "<a href=\"skapa.php\">Skapa Konto</a>
                          <a href=\"login.php\">Log In</a>";
                }
                ?>
            </nav>
        </header>
        <main class="wide">
            <div class="whiteDiv">
                <h2>Var ligger butikerna?</h2>
                <h3 class="ButikNamnTitle">Inet Butiker</h3>
                <div class="ButikSection">
                    <div class="ResBox">
                        <h4 class="ResTitle">Inet Hötorget</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Inet Barkaby</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                </div>
                <h3 class="ButikNamnTitle">Webhallen Butiker</h3>
                <div class="ButikSection">
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Sveavägen</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Medborgarplatse</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Sveavägen</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Medborgarplatse</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                </div>
                <h3 class="ButikNamnTitle">Elgiganten Butiker</h3>
                <div class="ButikSection">
                    <div class="ResBox">
                        <h4 class="ResTitle">Elgiganten Kungsgatan</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Nacka</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Kungens Kurva</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                    <div class="ResBox">
                        <h4 class="ResTitle">Webhallen Barkaby</h4>
                        <img src="images/map.png" alt="karta">
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>