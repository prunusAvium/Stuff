<?php
declare(strict_types=1);
class MobilePhone extends Mobile implements TouchScreen
{
    private $size;
    public function __construct(string $size, float $battery, string $operator, bool $canCall)
    {
        parent::__construct($battery, $operator, $canCall);
        $this->size = $size;
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