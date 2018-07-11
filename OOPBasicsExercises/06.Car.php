<?php

class Carr
{
    public $model;
    public $engine;
    public $cargo;
    public $tires;

    public function __construct(string $model, Engine $engine, Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->cargo = $cargo;
        $this->engine = $engine;
        $this->tires = $tires;
    }

}