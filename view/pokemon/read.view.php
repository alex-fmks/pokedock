<?php

function pokedex_read_view(array $data): string
{
$string = "<table>";
    $string .= "<tr>";
        foreach ($data[0] as $key => $value) {
        $string .= "<th>";
            $string .= "$key";
            $string .= "</th>";
        }
        $string .= "</tr>";


    foreach ($data as $index => $user) {
    $string .= "<td class='link' style='background-color: white'>";
        $id = $user['id'];
        $string .= "<a href='/pokemon/show/$id'>Show</a>";
        $string .= "</td>";
    //        $string .= "<td class='link' style='background-color: white'>";
        ////        $string .= "<a href='/pokemon/update/$id'>Update</a>";
        //        $string .= "</td>";
    //        $string .= "</tr>";
    }
    $string .= "</table>";
return $string;
}