<?php
declare(strict_types=1);
require_once '08.Pokemon1.php';
require_once '08.Trainer1.php';

$trainersAndPokemons = [];
$namesOfTrainers = [];

while(1)
{
    $input = trim(fgets(STDIN));
    if ($input == "Tournament"){
        break;
    }

    $trainerInfo = explode(' ', $input);
    $trainerName = $trainerInfo[0];
    $pokemonName = $trainerInfo[1];
    $pokemonElement = $trainerInfo[2];
    $pokemonHealth = intval($trainerInfo[3]);

    if (!in_array($trainerName, $namesOfTrainers)){
        $pokemon = new Pokemon1($pokemonName, $pokemonElement, $pokemonHealth);
        $trainer = new Trainer1($trainerName);
        $trainer->Pokemons($pokemon);
        $trainersAndPokemons[] = $trainer;
        $namesOfTrainers[] = $trainerName;
    } else {
        $pokemon = new Pokemon1($pokemonName, $pokemonElement, $pokemonHealth);

        foreach ($trainersAndPokemons as $trainerAndPokemon){
            if ($trainerAndPokemon->getName() == $trainerName){
                $trainerAndPokemon->Pokemons($pokemon);
            }
        }
    }
}

while(1)
{
    $input = trim(fgets(STDIN));

    if ($input == "End"){
        break;
    }
    foreach ($trainersAndPokemons as $trainerAndPokemon){
        $pokemonsByTrainer = $trainerAndPokemon->getPokemons();
        foreach ($pokemonsByTrainer as $key => $pokemon){
            if ($pokemon->getElement() == $input){
                $trainerAndPokemon->addBadge();
                break;
            } else {
                $pokemon->reduceHealth();
                if ($pokemon->getHealth() <= 0){
                    array_splice($pokemonsByTrainer, $key, 1);
                }
            }
        }
        $trainerAndPokemon->addPokemonCollection($pokemonsByTrainer);
    }
}

usort($trainersAndPokemons, 'orderByNumberOfBadges');
foreach ($trainersAndPokemons as $trainerAndPokemon){
    echo $trainerAndPokemon->getName() . ' ' .
        $trainerAndPokemon->getBadges() . ' ' .
        $trainerAndPokemon->countOfPokemons() . PHP_EOL;
}

function orderByNumberOfBadges($a, $b){
    return $a->getBadges() < $b->getBadges();
}