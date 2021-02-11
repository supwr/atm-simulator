<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObject;

use App\Domain\Shared\Exception\ValueObject\Name\InvalidValueException;

use \DateTime;

final class Date implements DateInteface
{
    protected Datetime $value;

    public function __construct(string $value)
    {
        if (!self::isValid($value)) {
            throw InvalidValueException::handle($value);
        }

        $this->value = \DateTime::createFromFormat('Y-m-d', $value);

        return $this;
    }

    public function getValue(): DateTime
    {
        return $this->value;
    }

    public function getFormatedDate(string $format='d/m/Y'): string
    {
        return $this->value->format($format);
    }

    public static function isValid(?string $value): bool
    {
        $date = \DateTime::createFromFormat('Y-m-d', $value);
        return $date !== false && $date->format('Y-m-d') == $value;
    }
}
