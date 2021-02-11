<?php

namespace App\Application\User;

use App\Application\User\Factory\CreateFactory;
use App\Application\User\Factory\UpdateFactory;
use App\Domain\User\UserServiceInterface;

class UserCommand
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(array $data)
    {
        $user = CreateFactory::createFromRequest($data);

        return $this->userService->create($user);
    }

    public function getUser(int $id)
    {
        return $this->userService->get($id);
    }

    public function updateUser(int $id, array $data)
    {
        $user = UpdateFactory::createFromRequest($data);

        return $this->userService->update($id, $user);
    }
}