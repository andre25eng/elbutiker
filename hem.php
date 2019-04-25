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
<body class="bodyFix">
    <div id="brbox"><p>nothing to see here</p></div>
    <div class="container">
        <header>
            <div>
                <h1>Elektronik Butiker STHLM</h1>
                <p>Välj butiken som passar dig bäst</p>
            </div>
            <nav>
                <a href="hem.php" id="curent">Hem</a>
                <a href="butiker.php">Butiker</a>
                <a href="recensioner.php">Recensioner</a>
                <?php 
                if ($_SESSION['loggedin']) {
                    echo "<a href=\"mapbox.php\">Lägg till Butik</a>
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
                <h2>Vad är Elektronik Butiker STHLM</h2>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
            </div>
        </main>
    </div>
</body>
</html>