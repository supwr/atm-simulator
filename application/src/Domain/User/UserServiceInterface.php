<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\User\Entity\User;

interface UserServiceInterface
{
    public function create(User $user): User;

    public function get(int $id): User;
}
