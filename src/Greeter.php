<?php
declare(strict_types=1);

namespace App;

final class Greeter
{
    public static function hello(string $name = 'world'): string
    {
        return "Hello, {$name}!";
    }
}
