<?php
require_once '../config/loader.php';
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
            case 'show':
                require_once('../src/pokemon/show.php');
                break;
            default:
                echo '404';
                break;
        }
        break;
}

