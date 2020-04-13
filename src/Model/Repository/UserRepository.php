<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\EntityInterface;
use Altech\Model\Entity\User;
use App\Component\Repository;

class UserRepository extends Repository
{
    const TABLE_NAME = "user";
    const ENTITY = User::class;

    public function findByEmail(string $email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE email = :email');
        $stmt->execute(['email' => $email]);

        return $stmt->fetchObject(User::class);
    }

    public function findByToken(string $token)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE recover_token = :recover_token');
        $stmt->execute(['recover_token' => $token]);

        return $stmt->fetchObject(User::class);
    }


    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
    }

    public function insert(EntityInterface $entity)
    {
        // TODO: Implement insert() method.
    }
}