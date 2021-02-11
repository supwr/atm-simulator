<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObject;

interface DocumentInterface
{
    public function getNumber(): string;

    public function getNumberMasked(): string;

    public static function isValid(?string $number): bool;
}
