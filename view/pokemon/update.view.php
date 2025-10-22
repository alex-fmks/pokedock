<?php
function department_update_view(array $data): string
{
    $string = "<form action='' method='post'>
    <label>Name:
        <input type='text' name='name' value='{$data['name']}'>
    </label><br>
    <label>Caught
        <input type='checkbox' name='caught' value='{$data['caught']}'>
    </label><br>
    <input type='hidden' name='id' value='{$data['id']} '>
    <input type='submit'>
</form>";


    return $string;


}

//var_dump(department_update_view(['name' => "bob", 'checked' => 'checked', 'work_mode' => 'ssdffg', 'id' => 1]));





