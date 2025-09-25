<?php
declare(strict_types=1);

/**
 * Return "even" or "odd" for a given integer.
 */
function evenOrOdd(int $n): string
{
    return $n % 2 === 0 ? 'even' : 'odd';
}
