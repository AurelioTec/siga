<?php

$host = "localhost";
$dbname = "sgedb";
$dbuser = "root";
$dbpassword = "";

try {
    $conectar = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    return $e->getMessage();
}
