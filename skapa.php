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
                <a href="butiker.php">Butiker</a>
                <a href="recensioner.php">Recensioner</a>
                <a id="curent" href="skapa.php">Skapa Konto</a>
                <a href="login.php">Log In</a>
            </nav>
        </header>
        <main>
            <div>
                <h2>Skapa Konto</h2>
                <form action="">
                    <label for="username">Användarnamn</label><input id="username" type="text"><br>
                    <label for="password">Lösenord</label><input id="password" type="password"><br>
                    <label for="email">E-post</label><input id="email" type="password"><br>
                    <label for="firstname">Förnamn</label><input id="firstname" type="password"><br>
                    <label for="surename">Efternamn</label><input id="surename" type="password"><br>
                    <button>Skapa</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>