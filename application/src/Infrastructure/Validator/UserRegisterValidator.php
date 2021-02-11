<?php

declare(strict_types=1);

namespace App\Infrastructure\Validator;

use App\Domain\Shared\ValueObject\Document;
use App\Domain\Shared\ValueObject\Name;
use App\Domain\Shared\ValueObject\Date;

class UserRegisterValidator extends AbstractValidator
{
    protected function handleValidation(): void
    {
        if (!Name::isValid($this->getValue('fullName'))) {
            $this->addError('firstName', 'param should be a valid name');
        }

        if (!Date::isValid($this->getValue('dateOfBirth'))) {
            $this->addError('dateOfBirth', 'param should be a valid date');
        }

        $document = $this->getValue('document');
        if (!Document::isValid($document)) {
            $this->addError(
                'document',
                'param cpf is invalid'
            );
        }
    }
}
