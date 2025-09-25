<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EvenOrOddTest extends TestCase
{
    public function testEven(): void
    {
        $this->assertSame('even', evenOrOdd(2));
    }

    public function testOdd(): void
    {
        $this->assertSame('odd', evenOrOdd(7));
    }
}
