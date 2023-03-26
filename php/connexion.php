<?php

function getPDO(): PDO{
    $host = 'localhost';
    $databaseName = 'secu';
    $username = 'secu';
    $password = 'secu';

    $pdo = new PDO("mysql::host=$host;dbname=$databaseName",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $pdo;

}