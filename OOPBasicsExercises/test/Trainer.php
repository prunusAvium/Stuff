<?php
declare(strict_types=1);

class Trainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $badges;

    /**
     * @var Pokemon[][]
     */
    private $pokemonsByElement;

    /**
     * Trainer constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->badges   = 0;
        $this->pokemonsByElement = [];
    }


    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int $badges
     */
    private function setBadges(int $badges)
    {
        $this->badges = $badges;
    }

    /**
     * @return int
     */
    public function getBadges(): int
    {
        return $this->badges;
    }



    /**
     * @param string $element
     * @return bool
     */

   public function hasPokemonByElement(string $element) : bool
   {
       return array_key_exists($element, $this->pokemonsByElement)
           && count($this->pokemonsByElement[$element]) > 0;
   }

   public function increaseBadges(){
       $this->setBadges($this->badges + 1);
   }
    /**
     * @param float $health
     */

   public function hitPokemons(float $health)
   {
       foreach ($this->pokemonsByElement as &$pokemons){
           foreach ($pokemons as $index => $pokemon) {
                $pokemon->decreaseHealth($health);

                if (!$pokemon->isAlive()){
                    unset($pokemons[$index]);
                }
           }
       }
   }
    /**
     * @param string $element
     * @param Pokemon $pokemon
     */
    public function addPokemonByElement(string $element, Pokemon $pokemon){
        $this->pokemonsByElement[$element][] = $pokemon;
    }

    public function __toString() :string
    {
        $pokemonsCount = 0;
        foreach ($this->pokemonsByElement as $pokemons){
            $pokemonsCount += count($pokemons);
        }

        return $this->name . " " . $this->badges . " " . $pokemonsCount;
    }
}