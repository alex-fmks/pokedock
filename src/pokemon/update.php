<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){

    $data = findById($id,'pokemon');
    if ($data['is_hiring']){
        $data['checked']='checked';
    }else{
        $data['checked']='';
    }
    $work_mode = $data['work_mode'];

    require_once '../view/pokemon/update.php';

}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    update('pokemon',$_POST);
    header("Location: ". DOMAIN_NAME. '/pokemon/show/'.$id);
    exit();
}

?>

