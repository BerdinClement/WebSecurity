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
    require_once './php/connexion.php';
    $userId = $_GET['id']??null;
    if (!$userId) {
        header('Location: ./index.html');
    }
    $bdd = getPDO();
    $query = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute(array($userId));
    $user = $query->fetch(PDO::FETCH_ASSOC);
?>

<nav class="navbar">
    <div class="logo">
        <h1>SECURITE WEB</h1>
    </div>
    <ul class="nav-links">
        <li><a href="/" >Injection SQL</a></li>
        <li><a href="faillexss.php">Faille XSS</a></li>
        <li><a href="otpMail.php">OTP Email</a></li>
    </ul>
</nav>

<body>
<div class="container">
    <div class="header">
        <h1>Information</h1>
    </div>
    <div class="info">
        <p>Voici vos informations, vous pouvez les modifier.</p>
    </div>

    <div class="content">
        <div class="content-block">
            <form action="./php/updateUser.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>" required>
                <input type="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Email" required>
                <input type="text" name="username" value="<?php echo $user['username'] ?>" placeholder="Nom d'utilisateur" required>
                <input type="text" name="name" value="<?php echo $user['name'] ?>" placeholder="Nom" required>
                <input type="text" name="firstname" value="<?php echo $user['firstname'] ?>" placeholder="Prénom" required>
                <button type="submit" name="submit">Valider</button>
            </form>
        </div>
    </div>
    <a class="explication_link" href="userProfileExplication.html">Explication</a>

</div>

<script src="./js/index.js"></script>
</body>
</html>
