<?php
declare(strict_types=1);
class Tablet extends Mobile implements TouchScreen
{
    private $stdResolution;
    public function __construct(string $stdResolution, float $battery)
    {
        parent::__construct($battery);
        $this->stdResolution = $stdResolution;
    }
    public function moveFinger()
    {
        // TODO: Implement moveFinger() method.
    }
    public function clickFinger()
    {
        // TODO: Implement clickFinger() method.
    }
    public function writeText(string $text)
    {
        // TODO: Implement writeText() method.
    }
}