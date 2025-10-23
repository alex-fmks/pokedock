<?php
require '../src/db/database.php';


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://pokeapi.co/api/v2/pokemon?limit=150',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response, true);

$count = count($responseArray['results']);

for ($i = 0; $i < $count; $i++) {
    $name = $responseArray['results'][$i]['name'];
}

$con = dbcon();

//for($i = 0; $i <count($response); $i++){
//    $con = "INSERT INTO pokemons(name) VALUES()";
//}

