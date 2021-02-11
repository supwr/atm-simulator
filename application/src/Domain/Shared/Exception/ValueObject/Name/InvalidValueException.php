<?php

declare(strict_types=1);

namespace App\Domain\Shared\Exception\ValueObject\Name;

use InvalidArgumentException;

class InvalidValueException extends InvalidArgumentException
{
    public static function handle(string $name): self
    {
        return new self(sprintf('Invalid name got [ %s ]', $name));
    }
}
