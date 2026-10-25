<?php

declare(strict_types=1);

namespace App\Patterns;

use InvalidArgumentException;

final readonly class Money
{
    /**
     * @param int $cents
     */
    private function __construct(
        public int $cents,
    ) {
        if ($cents < 0) {
            throw new InvalidArgumentException(
                'Amount cannot be negative.'
            );
        }
    }

    /**
     * @param int $cents
     * @return Money
     */
    public static function fromCents(int $cents): Money
    {
        return new self($cents);
    }

    /**
     * @return Money
     */
    public static function fromZero(): Money
    {
        return new self(0);
    }
}
