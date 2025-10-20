<?php

$host = 'localhost'; // oder IP deiner Datenbank
$dbname = 'pokemon';
$user = 'alexfmks';
$pass = 'lifehouse204';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB-Verbindung fehlgeschlagen: " . $e->getMessage());
}
