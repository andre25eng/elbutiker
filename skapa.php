<?php
/*
* PHP version 7
* @category   Elektronik Butiker
* @author     André Englund <andre25eng@gmail.com>
* @license    PHP CC
*/

error_reporting(E_ALL);
ini_set("display_erroes", 1);

include_once "./config-db.php";
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
                <a id="curent" href="skapa.php">Skapa Konto</a>
                <a href="login.php">Log In</a>
            </nav>
        </header>
        <main>
            <div>
                <h2>Skapa Konto</h2>
                <form action="#" method="post">
                    <label for="username">Användarnamn</label><input id="username" type="text" name="username"><br>
                    <label for="password">Lösenord</label><input id="password" type="password" name="password"><br>
                    <label for="email">E-post</label><input id="email" type="text" name="email"><br>
                    <label for="firstname">Förnamn</label><input id="firstname" type="text" name="firstname"><br>
                    <label for="surename">Efternamn</label><input id="surename" type="text" name="surename"><br>
                    <button>Skapa</button>
                </form>
                <?php
                if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["firstname"]) && isset($_POST["surename"])) {
                    
                    
                    $fnamn = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
                    $enamn = filter_input(INPUT_POST, "surename", FILTER_SANITIZE_STRING);
                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
                    $losen = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                    $anamn = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);

                    $conn = new mysqli($hostname, $user, $password, $database);

                    if ($conn->connect_error) {
                        die("Kunde inte ansluta till databasrn: " . $conn->connect_error);
                    }
                    
                    $hash = password_hash($losen, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO admin (fnamn, enamn, epost, lös, anamn) VALUES ('$fnamn', '$enamn', '$email', '$hash', '$anamn');";
                    echo $sql;
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Något blev fel med sql-satsen: " . $conn->connect_error);
                    }

                } else {
                    echo "något fel";
                }
                ?>
            </div>
        </main>
    </div>
</body>
</html>