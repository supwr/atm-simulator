<?php

declare(strict_types=1);

namespace App\Domain\Shared\Exception\ValueObject\Document;

use InvalidArgumentException;

class InvalidNumberException extends InvalidArgumentException
{
    public static function handle(string $number): self
    {
        return new self(sprintf('Invalid number got [ %s ]', $number));
    }
}
