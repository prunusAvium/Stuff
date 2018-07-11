<?php
class Cargo {
    public $type;
    public $weight;

    function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }
}