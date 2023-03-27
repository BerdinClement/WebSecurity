<?php

require_once './connexion.php';
$bdd = getPDO();

$password = $_POST["password"] ?? null;

if ($password) {

    $password = hash('sha256', $password);

    $query = $bdd->prepare('SELECT * FROM injection WHERE password = ?');
    $query->execute(array($password));

    if ($query->rowCount() == 1) {
        header('Location: ../index.html');
    } else {
        echo 'Mauvais mot de passe';
    }

}