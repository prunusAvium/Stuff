<?php
declare(strict_types=1);
class Laptop extends Computer implements Keyboard, Mouse, TouchPad
{
    private $battery;
    public function pressKey(string $pressKey)
    {
        // TODO: Implement pressKey() method.
    }
    public function changeStatus()
    {
        // TODO: Implement changeStatus() method.
    }
    public function click(bool $leftClick = false, bool $rightClick = false)
    {
        switch ($leftClick) {
            case true:
                echo "Laptop - Button Left Click" . PHP_EOL;
                break;
        }
        switch ($rightClick) {
            case true:
                echo "Laptop - Button Right Click" . PHP_EOL;
                break;
        }
    }
    public function move(int $currentX, int $currentY, int $offsetX, int $offsetY)
    {
        echo "Current - X{$currentX} and Y{$currentY}" . PHP_EOL .
            "Offset - X{$offsetX} and Y{$offsetY}" . PHP_EOL;
    }
    public function clickFinger()
    {
        // TODO: Implement clickFinger() method.
    }
    public function moveFinger()
    {
        // TODO: Implement moveFinger() method.
    }
}