<?php
declare(strict_types=1);
require_once 'Pokemon.php';
require_once 'Trainer.php';

$caughtPokemonsRawInfo = trim(fgets(STDIN));
/**
 * @var Trainer[] $trainers
 */
$trainers = [];
while ($caughtPokemonsRawInfo != 'Tournament') {
    $caughtPokemonsInfo = explode(" ", $caughtPokemonsRawInfo);
    $trainerName = $caughtPokemonsInfo[0];
    $pokemonName = $caughtPokemonsInfo[1];
    $pokemonElement = $caughtPokemonsInfo[2];
    $pokemonHealth = floatval($caughtPokemonsInfo[3]);

    if (!array_key_exists($trainerName, $trainers)){
        $trainers[$trainerName] = new Trainer($trainerName);
    }
    $trainer = $trainers[$trainerName];
    $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);
    $trainer->addPokemonByElement($pokemonElement, $pokemon);

    $caughtPokemonsRawInfo = trim(fgets(STDIN));
}

$element = trim(fgets(STDIN));
while ($element != 'End'){
    foreach ($trainers as $trainer){
        if ($trainer->hasPokemonByElement($element)){
            $trainer->increaseBadges();
        } else {
            $trainer->hitPokemons(10);
        }
    }
    $element = trim(fgets(STDIN));
}

usort($trainers, function (Trainer $trainer1, Trainer $trainer2){
    return $trainer2->getBadges() <=> $trainer1->getBadges();
});

foreach ($trainers as $trainer){
    echo $trainer . PHP_EOL;
}