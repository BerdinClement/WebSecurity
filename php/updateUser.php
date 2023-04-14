<?php

require_once ('./connexion.php');

$id = $_POST['id']??null;
$username = $_POST['username']??null;
$name = $_POST['name']??null;
$firstname = $_POST['firstname']??null;
$email = $_POST['email']??null;

if ($name && $firstname && $email && $id) {
    $bdd = getPDO();
    $query = $bdd->prepare("UPDATE users SET name = ?, firstname = ?, email = ? WHERE id = ?");
    $query->execute(array($name, $firstname, $email, $id));
    $query = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute(array($id));
    $user = $query->fetch(PDO::FETCH_ASSOC);
    header('Location: ../users.php?id='.$user['id']);
}