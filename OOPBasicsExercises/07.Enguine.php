<?php
declare(strict_types=1);

class Enguine {
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    /**
     * Enguine constructor.
     * @param $model
     * @param $power
     * @param $displacement
     * @param $efficiency
     */
    public function __construct($model, $power, $displacement, $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @return mixed
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * @param mixed $displacement
     */
    public function setDisplacement($displacement)
    {
        $this->displacement = $displacement;
    }

    /**
     * @return mixed
     */
    public function getEfficiency()
    {
        return $this->efficiency;
    }

    /**
     * @param mixed $efficiency
     */
    public function setEfficiency($efficiency)
    {
        $this->efficiency = $efficiency;
    }
}