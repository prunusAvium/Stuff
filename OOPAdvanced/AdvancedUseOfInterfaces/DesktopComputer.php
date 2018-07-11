<?php
declare(strict_types=1);
class DesktopComputer extends Computer implements Keyboard, Mouse
{
    private $keyboardConnected;
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
                echo "DesktopComputer - Button Left Click" . PHP_EOL;
                break;
        }
        switch ($rightClick) {
            case true:
                echo "DesktopComputer - Button Right Click" . PHP_EOL;
                break;
        }
    }
    public function move(int $currentX, int $currentY, int $offsetX, int $offsetY)
    {
        // TODO: Implement move() method.
    }
}