<?php
function department_show_view(array $data): string
{
    $string = "<div> {$data['name']} </div>";
    $string .= "<div> {$data['id']}</div>";
    $string .= "<div> {$data['work_mode']}</div>";
    $string .= "<a href = '/pokemon/update/{$data['id']}'>Update </a >";
    $string .= "<a href = '/pokemon/delete/{$data['id']}' >Delete </a > ";
  return $string;

}








