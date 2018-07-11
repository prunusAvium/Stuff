<?php
declare(strict_types=1);

class Trainer1 {
    private $name;
    private $badges;
    private $pokemons = [];

    public function __construct(string $name, int $badges = 0)
    {
        $this->name = $name;
        $this->badges = $badges;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setBadges(int $badges)
    {
        $this->badges = $badges;
    }

    public function getBadges(): int
    {
        return $this->badges;
    }

    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    public function Pokemons(Pokemon $pokemon){
        $this->pokemons[] = $pokemon;
    }

    public function addBadge(){
        return $this->badges++;
    }

    public function countOfPokemons(){
        return count($this->pokemons);
    }

    public function addPokemonCollection($collection)
    {
        $this->pokemons = $collection;
    }
}