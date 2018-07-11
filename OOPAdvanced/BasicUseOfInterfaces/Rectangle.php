<?php
declare(strict_types=1);

class Rectangle implements Area{
    private $width;
    private $height;

    /**
     * Rectangle constructor.
     * @param $width
     * @param $height
     */
    public function __construct(float $width, float $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param mixed $width
     */
    public function setWidth(float $width)
    {
        $this->width = $width;
    }

    /**
     * @param mixed $height
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    private function getArea(): float
    {
        return $this->width * $this->height;
    }

    public function getSurface():string
    {

        return "Rectangle, width = {$this->width} mm, height = {$this->height} mm, area = {$this->getArea()} mm";
    }

}
