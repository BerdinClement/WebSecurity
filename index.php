<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>SECURITE WEB</title>

</head>

    <nav class="navbar">
        <div class="logo">
            <h1>SECURITE WEB</h1>
        </div>
        <ul class="nav-links">
            <li><a href="/" class="active">Injection SQL</a></li>
            <li><a href="./faillexss.php">Faille XSS</a></li>
            <li><a href="">OTP Email</a></li>
            <li><a href="">OTP Email</a></li>
        </ul>
    </nav>

    <body>
        <div class="container">
            <div class="header">
                <h1>Injection Sql</h1>
            </div>
            <div class="info">
                <p>Entrez le password pour être redirigé sur la bonne page.</p>
            </div>
            <div class="content">
                <div class="content-block">
                    <h2>Avec Injection</h2>
                    <form action="./php/avecInjection.php" method="POST">
                        <input type="password" name="password" placeholder="Tester avec injection" required> <!-- Attribut Password -->
                        <button type="submit" name="submit">Valider</button>
                    </form>
                </div>
                <div class="content-block">
                    <h2>Sans injection</h2>
                    <form action="./php/sansInjection.php" method="POST">
                        <input type="password" name="password" placeholder="Tester sans injection" required>
                        <button type="submit" name="submit">Valider</button>
                    </form>
                </div>
            </div>
            <a class="explication_link" href="./injectionExplication.html">Explication</a>
        </div>

        <script src="./js/index.js"></script>
    </body>
</html>