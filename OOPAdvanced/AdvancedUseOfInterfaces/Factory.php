<?php
declare(strict_types=1);
class Factory
{
    public static function getWriter($class) {
        if (class_exists($class)) {
            return new $class();
        }
        throw new Exception('Unsupported format');
    }
}