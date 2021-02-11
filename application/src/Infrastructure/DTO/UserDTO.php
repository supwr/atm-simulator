<?php

declare(strict_types=1);

namespace App\Infrastructure\Domain\User\DTO;

use App\Domain\User\Entity\User;
use App\Infrastructure\DTO\DTOHelperTrait;
use App\Infrastructure\DTO\ItemInterface;

class UserDTO implements ItemInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toArray(): array
    {
        return [
            'id' => $this
                ->user
                ->getId()
            ,
            'fullName' => $this
                ->user
                ->getFullName()
            ,
            'document' => $this
                ->user
                ->getDocument()
        ];
    }
}
