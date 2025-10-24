DROP DATABASE if exists pokedex;
CREATE DATABASE pokedex;
use pokedex;

create table pokemons
(
    id    int auto_increment PRIMARY KEY,
    name varchar(255),
    type varchar(255)
);