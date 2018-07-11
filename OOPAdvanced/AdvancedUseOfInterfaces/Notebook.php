<?php
declare(strict_types=1);
class Notebook extends Computer implements Keyboard, Mouse, TouchScreen
{
    private $writtenText;
    public function writeText(string $text)
    {
        $this->writtenText = $text;
    }
    public function getWrittenText(): void
    {
        echo $this->writtenText . PHP_EOL;
    }
    public function pressKey(string $key)
    {
        echo $key . PHP_EOL;
    }
    public function changeStatus()
    {
        // TODO: Implement changeStatus() method.
    }
    public function click(bool $leftClick, bool $rightClick)
    {
        // TODO: Implement click() method.
    }
    public function move(int $currentX, int $currentY, int $offsetX, int $offsetY)
    {
    }
    public function moveFinger()
    {
        // TODO: Implement moveFinger() method.
    }
    public function clickFinger()
    {
        // TODO: Implement clickFinger() method.
    }
}