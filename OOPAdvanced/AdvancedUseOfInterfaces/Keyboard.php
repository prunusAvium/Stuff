<?php
declare(strict_types=1);
interface Keyboard
{
    public function pressKey(string $pressKey);
    public function changeStatus();
}