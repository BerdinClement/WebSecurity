<?php

require_once './connexion.php';
$bdd = getPDO();

$msg = $_POST['msg'] ?? null;

if ($msg) {

    $query = $bdd->prepare("INSERT INTO faillexss (msg) VALUES (?)")->execute(array($msg));

    if ($query) {
        header('Location: ../faillexss.php');
    } else {
        echo 'Mauvais mot de passe';
    }
}