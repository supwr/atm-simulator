<?php

declare(strict_types=1);

namespace App\Application\User\Factory;

use App\Domain\Shared\ValueObject\Date;
use App\Domain\Shared\ValueObject\Document;
use App\Domain\Shared\ValueObject\Name;
use App\Domain\User\Entity\User;

class CreateFactory
{
    public static function createFromRequest(array $requestData): User
    {
        $user = new User();
        $user->setFullName((new Name($requestData['fullName']))->getValue());
        $user->setDateOfBirth((new Date($requestData['dateOfBirth']))->getValue());
        $user->setDocument((new Document($requestData['document']))->getNumber());
        $user->setCreatedAt(new \DateTime());

        return $user;
    }
}
