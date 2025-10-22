<?php

$host = 'mariadb'; // oder IP deiner Datenbank
$dbname = 'pokedex';
$user = 'alexfmks';
$pass = 'lifehouse204';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB-Verbindung fehlgeschlagen: " . $e->getMessage());
}
