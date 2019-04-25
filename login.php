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
                    echo "<a href=\"mapbox.php\">Lägg till Butik</a>
                          <a href=\"logut.php\">Log Ut</a>";
                } else {
                    echo "<a href=\"skapa.php\">Skapa Konto</a>
                          <a id=\"curent\" href=\"login.php\">Log In</a>";
                }
                ?>
            </nav>
        </header>
        <main>
            <div>
                <h2>Log in</h2>
                <form action="#" method="post">
                    <label for="username">Användarnamn</label><input id="username" type="text" name="username" required><br>
                    <label for="password">Lösenord</label><input id="password" type="password" name="password" required><br>
                    <button>Log in</button>
                </form>
                <?php
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $anamn = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $losen = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

                    $conn = new mysqli($hostname, $user, $password, $database);

                    if ($conn->connect_error) {
                        die("Kunde inte ansluta till databasrn: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM admin WHERE anamn = '$anamn'";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Något blev fel med sql-satsen: " . $conn->error);
                    } else {
                        $user = $result->fetch_assoc();

                        if (password_verify($losen, $user['losen'])) {
                            $_SESSION['loggedin'] = true;
                            $_SESSION['anamn'] = $user['anamn'];
                            header('Location: mapbox.php');
                        } else {
                            echo "<script>alert('Lösenordet är fel!')</script>";
                        }
                    }
                }
                ?>
            </div>
        </main>
    </div>
</body>
</html>