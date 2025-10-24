<?php
header('Content-type: application/json');
$conn = dbcon();
$sql = "SELECT * FROM pokemons";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(['data' => $result]);