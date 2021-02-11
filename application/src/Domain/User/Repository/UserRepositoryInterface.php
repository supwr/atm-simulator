<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Domain\User\Entity\User;

interface UserRepositoryInterface
{
    public function add(User $user): void;

    public function edit(int $id, User $user): User;

    public function list(): array;

    public function get(int $id): ?User;

}