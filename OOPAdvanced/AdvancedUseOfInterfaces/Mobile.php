<?php
declare(strict_types=1);
abstract class Mobile
{
    private $operator;
    private $canCall;
    private $battery;
    public function __construct(float $battery, string $operator = null, bool $canCall = false)
    {
        $this->operator = $operator;
        $this->battery = number_format($battery, 2, '.', '') .'%';
        $this->canCall = $canCall;
    }
}