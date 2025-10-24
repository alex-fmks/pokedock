<?php
require_once '../config/loader.php';
$request = explode('/', $_SERVER["REQUEST_URI"]);
$entity = $request[1] ?? '';
$method = $request[2] ?? '';
$id = $request[3] ?? null;

//if($entity === 'api') {
//    $entity === $request[2];
//    $method === $_SERVER["REQUEST_METHOD"];
//}

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
            case 'show':
                require_once('../src/pokemon/show.php');
                break;
            default:
                echo '404';
                break;
        }
        break;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../src/api/post.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once('../src/api/get.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    require_once('../src/api/put.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    require_once('../src/api/delete.php');
}

