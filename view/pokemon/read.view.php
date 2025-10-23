<?php

function pokedex_read_view(array $data): string
{
    $string = "<table border='1'>";

    // Tabellenkopf
    $string .= "<tr>";
    foreach (array_keys($data[0]) as $key) {
        $string .= "<th>$key</th>";
    }
    $string .= "<th>Action</th>";
    $string .= "</tr>";

    // Tabellendaten
    foreach ($data as $user) {
        $id = $user['id'];
        $string .= "<tr>";
        foreach ($user as $value) {
            $string .= "<td>$value</td>";
        }
        $string .= "<td><a href='/pokemon/show/$id'>Show</a></td>";
        $string .= "</tr>";
    }

    $string .= "</table>";
    return $string;
}