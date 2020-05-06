<?php

namespace Altech\Model\Repository;

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
        $in = str_repeat('?,', count($roles) - 1) . '?';
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


    /**
     * @param User $user
     * @return User
     */
    public function insert($user): User
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO ' . self::TABLE_NAME . ' ('.
                'name, address, city, zipcode, email, phone, password, role, cgu_approvement, '.
                'legalrepresentative_firstname, legalrepresentative_lastname, legalrepresentative_email, legalrepresentative_phone '.
            ') VALUES ('.
            ':name, :address, :city, :zipcode, :email, :phone, :password, :role, :cgu_approvement, '.
            ':legalrepresentative_firstname, :legalrepresentative_lastname, :legalrepresentative_email, :legalrepresentative_phone)'
        );

        $stmt->execute([
            'role' => htmlspecialchars($user->getRole()),
            'name' => htmlspecialchars($user->getName()),
            'address' => htmlspecialchars($user->getAddress()),
            'city' => htmlspecialchars($user->getCity()),
            'zipcode' => htmlspecialchars($user->getZipCode()),
            'email' => htmlspecialchars($user->getEmail()),
            'phone' => htmlspecialchars($user->getPhone()),
            'password' => htmlspecialchars($user->getPassword()),
            'cgu_approvement' => htmlspecialchars($user->getCguApprovement()),
            'legalrepresentative_firstname' => htmlspecialchars($user->getRepresentativeFirstName()),
            'legalrepresentative_lastname' => htmlspecialchars($user->getRepresentativeLastName()),
            'legalrepresentative_email' => htmlspecialchars($user->getRepresentativeEmail()),
            'legalrepresentative_phone' => htmlspecialchars($user->getRepresentativePhone())
        ]);

        $user->setId($this->pdo->lastInsertId());
        return $user;
    }


    /**
     * @param User $user
     */
    public function update($user): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE ' . self::TABLE_NAME . ' SET '.
                'name = :name, '.
                'address = :address, '.
                'city = :city, ' .
                'zipcode = :zipcode, '.
                'email = :email, '.
                'phone = :phone, '.
                'picture = :picture,'.
                'password = :password,'.
                'recover_token = :recover_token,'.
                'legalrepresentative_firstname = :legalrepresentative_firstname, '.
                'legalrepresentative_lastname = :legalrepresentative_lastname,'.
                'legalrepresentative_email = :legalrepresentative_email,'.
                'legalrepresentative_phone = :legalrepresentative_phone'.
            ' WHERE id = :id');

        $stmt->execute([
            'id' => htmlspecialchars($user->getId()),
            'name' => htmlspecialchars($user->getName()),
            'address' => htmlspecialchars($user->getAddress()),
            'city' => htmlspecialchars($user->getCity()),
            'zipcode' => htmlspecialchars($user->getZipCode()),
            'email' => htmlspecialchars($user->getEmail()),
            'phone' => htmlspecialchars($user->getPhone()),
            'picture' => htmlspecialchars($user->getPictureFile()),
            'password' => htmlspecialchars($user->getPassword()),
            'recover_token' => htmlspecialchars($user->getRecoverToken()),
            'legalrepresentative_firstname' => htmlspecialchars($user->getRepresentativeFirstName()),
            'legalrepresentative_lastname' => htmlspecialchars($user->getRepresentativeLastName()),
            'legalrepresentative_email' => htmlspecialchars($user->getRepresentativeEmail()),
            'legalrepresentative_phone' => htmlspecialchars($user->getRepresentativePhone())
        ]);
    }


}