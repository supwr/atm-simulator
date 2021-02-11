<?php

namespace App\Domain\User;

use App\Domain\User\Entity\User;
use App\Domain\User\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(User $user): User
    {
        $this->userRepository->add($user);
        return $user;
    }

    public function update(int $id, User $user): User
    {
        return $this->userRepository->edit($id, $user);
    }

    public function get(int $id): User
    {
        return $this->userRepository->get($id);
    }
}