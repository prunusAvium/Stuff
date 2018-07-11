<?php
declare(strict_types=1);

class Tiger extends Felime {
    const SOUND = "ROAAR!!!";
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        $this->sound = self::SOUND;
        parent::__construct($name, $type, $weight, $livingRegion);
    }
    public function eat(Food $food, $footType)
    {
        if ($footType != "Meat") {
            throw new \Exception(basename(get_class($this)) . "s are not eating that type of food!");
        }
        parent::eat($food, $footType);
    }
}