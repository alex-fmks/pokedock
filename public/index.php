<?php
require_once '../config/config.php';
$request = explode('/', $_SERVER["REQUEST_URI"]);
$entity = $request[1] ?? '';
$method = $request[2] ?? '';
$id = $request[3] ?? null;

switch ($entity) {
    case 'pokemon':
        switch ($method) {
            case '':
                require_once('./index.php');
                break;
            case 'create':
                require_once('../src/pokemon/create.php');
                break;
            case 'read':
                require_once('../src/pokemon/read.php');
                break;
            case 'update':
                require_once('../src/pokemon/update.php');
                break;
            case 'delete':
                require_once('../src/pokemon/delete.php');
                break;
            case 'item':
                require_once('../src/pokemon/item.php');
                break;
            default:
                echo '404';
                break;
        }
        break;
}
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Pokémon CSS Theme — Beispielseite</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Inter:wght@300;400;600&display=swap"
          rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
<div class="wrap">
    <header>
        <div class="logo">
            <div class="pokeball" aria-hidden="true"></div>
            <div>
                <h1>Pokémon Database</h1>
            </div>
        </div>
    </header>
    <div>
        <section class="grid">
            <a href="pokemon/read">Alle Pokemons</a>
        </section>
    </div>
</div>
</body>
</html>

