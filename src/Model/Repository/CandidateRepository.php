<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\Candidate;
use Altech\Model\Entity\EntityInterface;
use Altech\Model\Entity\User;
use App\Component\Repository;
use PDO;

class CandidateRepository extends Repository
{
    const TABLE_NAME = "candidate";
    const ENTITY = Candidate::class;

    public function findAllOfUser(User $client) {
        $stmt = $this->pdo->prepare('SELECT * FROM '. self::TABLE_NAME .' WHERE client_id = :client_id ORDER BY lastname ASC');
        $stmt->bindValue(':client_id', $client->getId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::ENTITY);
    }

    public function findPageCountWithFilter(int $client, string $filter, int $size = self::DEFAULT_SIZE): int
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*)/(:size) as "count" FROM ' . self::TABLE_NAME . ' WHERE CONCAT(firstname," ", lastname) LIKE :filter AND client_id = :client');
        $stmt->bindValue(':size', $size, PDO::PARAM_INT);
        $stmt->bindValue(':filter', $filter, PDO::PARAM_STR);
        $stmt->bindValue(':client', $client, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch()["count"];
    }

    public function findCandidatesWithFilter(int $client, string $filter, int $page, int $size = self::DEFAULT_SIZE): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE CONCAT(firstname," ", lastname) LIKE :filter AND client_id = :client LIMIT :offset, :size');
        $stmt->bindValue(':offset', $page * $size, PDO::PARAM_INT);
        $stmt->bindValue(':size', $size, PDO::PARAM_INT);
        $stmt->bindValue(':filter', "%$filter%", PDO::PARAM_STR);
        $stmt->bindValue(':client', $client, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::ENTITY);
    }
    
    public function findByName(String $name){
        $stmt = $this->pdo->prepare('SELECT * FROM '. self::TABLE_NAME ." WHERE :name IN (lastname, firstname, CONCAT(CONCAT(firstname, ' '),lastname), CONCAT(CONCAT(lastname, ' '),firstname)) 
                                                                            ORDER BY lastname ASC");
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchObject(self::ENTITY);
    }

    /**
     * @param Candidate $candidate
     * @return void
     */
    public function update($candidate): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE ' . self::TABLE_NAME .
            ' SET firstname = :firstname, lastname = :lastname, sex = :sex, height = :height, weight = :weight, email = :email, phone = :phone, cgu_approvement = :cgu_approvement' .
            ' WHERE id = :id'
        );

        $stmt->execute([
            'id' => htmlspecialchars($candidate->getId()),
            'firstname' => htmlspecialchars($candidate->getFirstname()),
            'lastname' => htmlspecialchars($candidate->getLastname()),
            'sex' => $candidate->getSex() ?? "NULL",
            'height' => htmlspecialchars($candidate->getHeight()),
            'weight' => htmlspecialchars($candidate->getWeight()),
            'email' => htmlspecialchars($candidate->getEmail()),
            'phone' => htmlspecialchars($candidate->getPhone()),
            'cgu_approvement' => htmlspecialchars($candidate->getCguApprovement()),
        ]);
    }

    /**
     * @param Candidate $candidate
     * @return Candidate
     */
    public function insert($candidate)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO ' . self::TABLE_NAME .
            '(firstname, lastname, sex, height, weight,  email, phone, cgu_approvement, client_id )' .
            'VALUES (:firstname, :lastname, :sex, :height, :weight,  :email, :phone, :cgu_approvement, :client_id )'
        );

        $stmt->execute([
            'firstname' => htmlspecialchars($candidate->getFirstname()),
            'lastname' => htmlspecialchars($candidate->getLastname()),
            'sex' => $candidate->getSex(),
            'height' => htmlspecialchars($candidate->getHeight()),
            'weight' => htmlspecialchars($candidate->getWeight()),
            'email' => htmlspecialchars($candidate->getEmail()),
            'phone' => htmlspecialchars($candidate->getPhone()),
            'cgu_approvement' => htmlspecialchars($candidate->getCguApprovement()),
            'client_id' => htmlspecialchars($candidate->getClientId())
        ]);

        $candidate->setId($this->pdo->lastInsertId());
        return $candidate;
    }
}