<?php
require_once '../config/loader.php';
$request = explode('/', $_SERVER["REQUEST_URI"]);
$entity = $request[1] ?? null;
$method = $request[2] ?? null;
$id = $request[3] ?? null;

if($entity === 'api') {
    $entity = $request[2] ?? null;
    $method = $_SERVER['REQUEST_METHOD'] ?? null;
    $id = $request[3] ?? null;

    switch ($method) {
        case 'GET':
            if ($id) {
                header('Content-type: application/json');
                echo json_encode(['data' => findById($id, 'pokemons')]);
            }
            else {
                header("Content-type: application/json");
                echo json_encode(['data' => findAll('pokemons')]);
            }
            break;

        case 'POST':
            $data = $_POST;
            create('pokemons', $data);
            header('Content-type: application/json');
            break;

        case 'PUT':
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            update('pokemons', $data);
            header('Content-type: application/json');
            echo json_encode(['data' => findById($id, 'pokemons')]);
            break;

        case 'DELETE':
            remove($id, 'pokemons');
            break;
    }
} elseif ($entity === 'pokemon' && $method === '') {
    require_once('./index.php');
} elseif ($entity === 'pokemon' && $method === 'create') {
    require_once('../src/pokemon/create.php');
} elseif ($entity === 'pokemon' && $method === 'read') {
    require_once('../src/pokemon/read.php');
} elseif ($entity === 'pokemon' && $method === 'update') {
    require_once('../src/pokemon/update.php');
} elseif ($entity === 'pokemon' && $method === 'delete') {
    require_once('../src/pokemon/delete.php');
} elseif ($entity === 'pokemon' && $method === 'show') {
    require_once('../src/pokemon/show.php');
} else {
    echo '404 Not Found';
}


