<?php

require_once './connexion.php';
$bdd = getPDO();

$password = $_POST['password']??null;

if ($password) {

    $password = hash('sha256', $password);

    $query = $bdd->query("SELECT * FROM injection where password = '$password'");

    if ($query->rowCount() == 1) {
        header('Location: ../index.php');
    } else {
        echo 'Mauvais mot de passe';
    }
}