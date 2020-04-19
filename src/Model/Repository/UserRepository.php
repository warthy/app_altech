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
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE company_email = :company_email');
        $stmt->execute(['company_email' => $email]);

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


    /**
     * @param User $user
     * @return User
     */
    public function insert($user): User
    {
        $stmt = $this->pdo->prepare('INSERT INTO ' . self::TABLE_NAME . ' (company_name,
                                                                            company_address,
                                                                            company_city,
                                                                            company_zipcode,
                                                                            company_email,
                                                                            company_phone,
                                                                            legalrepresentative_firstname,
                                                                            legalrepresentative_lastname,
                                                                            legalrepresentative_email,
                                                                            legalrepresentative_phone
                                                                            ) VALUES (:company_name,
                                                                            :company_address,
                                                                            :company_city,
                                                                            :company_zipcode,
                                                                            :company_email,
                                                                            :company_phone,
                                                                            :legalrepresentative_firstname,
                                                                            :legalrepresentative_lastname,
                                                                            :legalrepresentative_email,
                                                                            :legalrepresentative_phone)');
        
        
        $company_name = $user->getCompanyName();
        $company_address = $user->getCompanyAddress();
        $company_city = $user->getCompanyCity();
        $company_zipcode = $user->getCompanyZipCode();
        $company_email = $user->getCompanyEmail();
        $company_phone = $user->getCompanyPhone();
        $legalrepresentative_firstname = $user->getRepresentativeFirstName();
        $legalrepresentative_lastname = $user->getRepresentativeLastName();
        $legalrepresentative_email = $user->getRepresentativeEmail();
        $legalrepresentative_phone = $user->getRepresentativePhone();
        

        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':company_address', $company_address);
        $stmt->bindParam(':company_city', $company_city);
        $stmt->bindParam(':company_zipcode', $company_zipcode);
        $stmt->bindParam(':company_email', $company_email);
        $stmt->bindParam(':company_phone', $company_phone);
        $stmt->bindParam(':legalrepresentative_firstname', $legalrepresentative_firstname);
        $stmt->bindParam(':legalrepresentative_lastname', $legalrepresentative_lastname);
        $stmt->bindParam(':legalrepresentative_email', $legalrepresentative_email);
        $stmt->bindParam(':legalrepresentative_phone', $legalrepresentative_phone);

        $stmt->execute();
        $user->setId($this->pdo->lastInsertId());

        return $user;
    }


    /**
     * @param User $user
     */
    public function update($user): void
    {
        $stmt = $this->pdo->prepare('UPDATE ' . self::TABLE_NAME . ' SET company_name = :company_name,
                                                                        company_address = :company_address,
                                                                        company_city = :company_city,
                                                                        company_zipcode = :company_zipcode,
                                                                        company_email :company_email,
                                                                        company_phone :company_phone,
                                                                        legalrepresentative_firstname = :legalrepresentative_firstname,
                                                                        legalrepresentative_lastname = :legalrepresentative_lastname,
                                                                        legalrepresentative_email = :legalrepresentative_email,
                                                                        legalrepresentative_phone = :legalrepresentative_phone
                                                                            WHERE id = :id');
        $stmt->execute([
            'id' => $user->getId(),
            'company_name' => $user->getCompanyName(),
            'company_address' => $user->getCompanyAddress(),
            'company_city' => $user->getCompanyCity(),
            'company_zipcode' => $user->getCompanyZipCode(),
            'company_email' => $user->getCompanyEmail(),
            'company_phone' => $user->getCompanyPhone(),
            'legalrepresentative_firstname' => $user->getRepresentativeFirstName(),
            'legalrepresentative_lastname' => $user->getRepresentativeLastName(),
            'legalrepresentative_email' => $user->getRepresentativeEmail(),
            'legalrepresentative_phone' => $user->getRepresentativePhone()
        ]);
      
    /**
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