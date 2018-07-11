<?php
declare(strict_types = 1);

class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var float
     */
    private $health;

    /**
     * Pokemon constructor.
     * @param string $name
     * @param string $element
     * @param float $health
     */
    public function __construct(string $name, string $element, float $health)
    {
        $this->setName($name);
        $this->setElement($element);
        $this->setHealth($health);
    }


    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $element
     */
    private function setElement(string $element)
    {
        $this->element = $element;
    }

    /**
     * @param float $health
     */
    private function setHealth(float $health)
    {
        $this->health = $health;
    }

    /**
     * @param float $health
     */
    public function decreaseHealth(float $health)
    {
        $this->setHealth($this->health - $health);
    }

    public function isAlive() : bool
    {
        return $this->health > 0;
    }
}