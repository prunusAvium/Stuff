<?php
declare(strict_types=1);
abstract class Computer
{
    private $processor;
    private $ram;
    public function __construct(string $processor, string $ram)
    {
        $this->processor = $processor;
        $this->ram = $ram;
    }
}