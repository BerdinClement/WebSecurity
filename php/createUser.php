<?php

require_once ('./connexion.php');

$username = $_POST['username']??null;
$name = $_POST['name']??null;
$firstname = $_POST['firstname']??null;
$email = $_POST['email']??null;
$password = $_POST['password']??null;

if ($name && $firstname && $email && $password) {
    $bdd = getPDO();
    $query = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute(array($email));

    if ($query->rowCount() > 0) {
        echo '<script>alert("Email déjà utilisé")</script>';
        header('Location: ../otpMail.php');
    } else {
        $password = hash('sha256', $password);
        $query = $bdd->prepare("INSERT INTO users (name, username, firstname, email, password) VALUES (?, ?, ?, ?, ?)");
        $query->execute(array($name,$username, $firstname, $email, $password));
        header('Location: ../otpMail.php');
    }
}