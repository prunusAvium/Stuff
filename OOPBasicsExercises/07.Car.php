<?php
declare(strict_types=1);

class Car {
    private $model;
    private $enguine;
    private $weight;
    private $color;

    /**
     * Car constructor.
     * @param $model
     * @param $enguine
     * @param $weight
     * @param $color
     */
    public function __construct($model, $enguine, $weight = null, $color = null)
    {
        $this->model = $model;
        $this->enguine = $enguine;
        $this->weight = $weight;
        $this->color = $color;
    }


}

