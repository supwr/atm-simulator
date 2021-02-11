<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function edit(int $id, User $user): User
    {
        $editUser = $this->get($id);
        $editUser->setUpdatedAt($user->getUpdatedAt());
        $editUser->setFullName($user->getFullName());
        $editUser->setDocument($user->getDocument());
        $editUser->setDateOfBirth($user->getDateOfBirth());

        $this->_em->persist($editUser);
        $this->_em->flush();

        return $editUser;
    }

    public function list(): array
    {
        return $this->createQueryBuilder('users')
            ->getQuery()
            ->getResult();
    }

    public function get(int $id): ?User
    {
        return $this->find($id);
    }
}
