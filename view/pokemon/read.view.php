<?php

function pokedex_read_view(array $data): string
{
    $string = <<<HTML
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Pokédex Übersicht</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        /* === Pokédex Style === */
        body {
            font-family: "Press Start 2P", monospace, sans-serif;
            background: linear-gradient(135deg, #f0f0f0, #d0e8ff);
            color: #222;
            margin: 2rem;
        }

        .pokedex-header {
            background: linear-gradient(145deg, #ef5350, #d32f2f);
            color: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .pokedex-header::before {
            content: "⚪";
            position: absolute;
            top: 1rem;
            left: 1rem;
            font-size: 1.8rem;
            color: #90caf9; /* Pokéball-Licht */
            text-shadow: 0 0 8px white;
        }

        .pokedex-header h1 {
            margin: 0;
            font-size: 1rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .pokedex-header span {
            display: block;
            font-size: 0.6rem;
            color: #ffe082;
            margin-top: 0.3rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background: #ef5350;
            color: white;
            text-align: left;
            padding: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.8rem;
        }

        td {
            padding: 0.7rem 1rem;
            border-bottom: 1px solid #e0e0e0;
            font-size: 0.85rem;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #fff3cd;
            transition: background 0.2s ease-in-out;
        }

        td a {
            background: #42a5f5;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.75rem;
            transition: all 0.2s ease-in-out;
        }

        td a:hover {
            background: #1e88e5;
            transform: scale(1.05);
        }

        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 1rem;
                border: 2px solid #ef5350;
                border-radius: 8px;
                padding: 0.5rem;
            }

            td, th {
                border: none;
                display: flex;
                justify-content: space-between;
            }

            th {
                background: none;
                color: #ef5350;
            }

            .pokedex-header h1 {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="pokedex-header">
        <h1>Pokédex</h1>
        <span>Trainer Data Console</span>
    </div>
HTML;

    $string .= "<table>";

    // Tabellenkopf
    $string .= "<tr>";
    foreach (array_keys($data[0]) as $key) {
        $string .= "<th>" . htmlspecialchars($key) . "</th>";
    }
    $string .= "<th>Action</th>";
    $string .= "</tr>";

    // Tabellendaten
    foreach ($data as $pokemon) {
        $id = htmlspecialchars($pokemon['id']);
        $string .= "<tr>";
        foreach ($pokemon as $value) {
            $string .= "<td>" . htmlspecialchars($value) . "</td>";
        }
        $string .= "<td><a href='/pokemon/show/$id'>Show</a></td>";
        $string .= "</tr>";
    }

    $string .= "</table>";
    $string .= "</body></html>";

    return $string;
}