<?php


# Verbindung mit der Datenbank mit einem PDO Objekt

# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$data = findAll('pokemons');
//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";

//require_once '../view/pokemon/read.php';

echo render('pokedex_read_view',$data);




