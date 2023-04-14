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
            <li><a href="./" >Injection SQL</a></li>
            <li><a href="./faillexss.php" class="active">Faille XSS</a></li>
            <li><a href="otpMail.php">OTP Email</a></li>
        </ul>
    </nav>

    <body>
    <div class="container">

        <div class="header">
            <h1>Faille XSS</h1>
        </div>
        <div class="info">
            <p>Entrez un message pour voir le résultat de la faille.</p>
        </div>
        <div class="content">
            <div class="content-block">
                <h2>Avec la faille</h2>
                <form action="./php/avecXSS.php" method="POST">
                    <input type="text" name="msg" placeholder="Tester avec faille" required> <!-- Attribut Password -->
                    <button type="submit" name="submit">Valider</button>
                </form>
            </div>
            <div class="content-block">
                <h2>Sans la faille</h2>
                <form action="./php/sansXSS.php" method="POST">
                    <input type="text" name="msg" placeholder="Tester sans faille" required>
                    <button type="submit" name="submit">Valider</button>
                </form>
            </div>
        </div>
        <a class="explication_link" href="./failleXSSExplication.html">Explication</a>
        <ul>
            <?php
            require_once './php/connexion.php';
            $bdd = getPDO();

            $query = $bdd->query('SELECT * FROM faillexss');

            if ($query->rowCount() > 0){
                foreach ($query as $row) {
                    ?><li><?php echo $row['msg'] ?></li><?php

                }
            }
            ?>
        </ul>

    </div>

    </body>
</html>