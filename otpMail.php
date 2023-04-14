<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>SECURITE WEB</title>

</head>

<?php
    $otp = $_GET['otp']??null;
?>

<nav class="navbar">
    <div class="logo">
        <h1>SECURITE WEB</h1>
    </div>
    <ul class="nav-links">
        <li><a href="/" >Injection SQL</a></li>
        <li><a href="faillexss.php">Faille XSS</a></li>
        <li><a href="otpMail.php" class="active">OTP Email</a></li>
    </ul>
</nav>

<body>
<div class="container">
    <div class="header">
        <h1>Connexion</h1>
    </div>
    <div class="info">
        <p>Connectez-vous avec votre adresse e-mail et votre mot de passe.</p>
    </div>
    <a href="createUser.html">Créez votre user</a>
    <div class="content">
        <div class="content-block">
            <form action="./php/authUser.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="submit">Valider</button>
            </form>
        </div>
    </div>
    <a class="explication_link" href="otpMailExplication.html">Explication</a>
    <?php
    if (isset($otp)) {
        echo '
        <div class="content">
            <div class="content-block">
                <form action="./php/verifyOtp.php" method="POST">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="otp" placeholder="OTP" required>
                    <button type="submit" name="submit">Valider</button>
                </form>
            </div>
            </div>
            ';
    } ?>
</div>

<script src="./js/index.js"></script>
</body>
</html>