<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\EntityInterface;
use Altech\Model\Entity\User;
use App\Component\Repository;
use App\KernelFoundation\Security;
use PDO;

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

    public function findAllByRole(string $role): array
    {
        $roles = Security::getInheritedRoles($role);
        $in  = str_repeat('?,', count($roles) - 1) . '?';
        $stmt = $this->pdo->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE role IN ($in) ");
        $stmt->execute($roles);

        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function findSuperAdminCount(): int
    {
        $stmt = $this->pdo->query('SELECT COUNT(id) FROM ' . self::TABLE_NAME . ' WHERE role = "ROLE_SUPER_ADMIN" ');
        $stmt->execute();

        return $stmt->fetchColumn(0);
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


    /**
     * @param User $user
     * @return User
     */
    public function insert($user): User
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO ' . self::TABLE_NAME . ' (name, email, phone, role, password) VALUES (:name, :email, :phone, :role, :password)'
        );
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':phone', $user->getPhone());
        $stmt->bindValue(':role', $user->getRole());
        $stmt->bindValue(':password', $user->getPassword());

        $stmt->execute();
        $user->setId($this->pdo->lastInsertId());

        return $user;
    }
}