<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once '../view/pokemon/create.view.html';
} elseif ($_SERVER['REQUEST_METHOD']) {
    $id = create('pokemon',$_POST);
    header("Location: ". DOMAIN_NAME. '/pokemon/show/'.$id);
    exit();
}




