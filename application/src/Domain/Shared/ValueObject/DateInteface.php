<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObject;

use \DateTime;

interface DateInteface
{
    public function getValue(): DateTime;

    public function getFormatedDate(): string;

    public static function isValid(string $name): bool;
}
