<?php
$data = findById($id, 'pokemons');
var_dump($data);


echo render('pokemon_show_view',$data);


