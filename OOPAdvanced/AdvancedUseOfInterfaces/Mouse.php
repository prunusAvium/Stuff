<?php
declare(strict_types=1);
interface Mouse
{
    public function click(bool $leftClick, bool $rightClick);
    public function move(int $currentX, int $currentY, int $offsetX, int $offsetY);
}