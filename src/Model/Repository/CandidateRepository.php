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

    /**
     * @param Candidate $candidate
     * @return void
     */
    public function update($candidate): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE ' . self::TABLE_NAME .
            'SET firstname = :firstname, lastname = :lastname, sex = :sex, height = :height, weight = :weight,  email = :email, phone = :phone ' .
            'WHERE id = :id'
        );

        $stmt->execute([
            'id' => htmlspecialchars($candidate->getId()),
            'firstname' => htmlspecialchars($candidate->getFirstname()),
            'lastname' => htmlspecialchars($candidate->getLastname()),
            'sex' => htmlspecialchars($candidate->getSex()),
            'height' => htmlspecialchars($candidate->getHeight()),
            'weight' => htmlspecialchars($candidate->getWeight()),
            'email' => htmlspecialchars($candidate->getLastname()),
            'phone' => htmlspecialchars($candidate->getPhone()),
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
            '(firstname, lastname, sex, height, weight,  email, phone, cgu_approvement, user_id )' .
            'VALUES (:firstname, :lastname, :sex, :height, :weight,  :email, :phone, :cgu_approvement, :user_id )'
        );

        $stmt->execute([
            'firstname' => htmlspecialchars($candidate->getFirstname()),
            'lastname' => htmlspecialchars($candidate->getLastname()),
            'sex' => htmlspecialchars($candidate->getSex()),
            'height' => htmlspecialchars($candidate->getHeight()),
            'weight' => htmlspecialchars($candidate->getWeight()),
            'email' => htmlspecialchars($candidate->getLastname()),
            'phone' => htmlspecialchars($candidate->getPhone()),
            'cgu_approvement' => htmlspecialchars($candidate->getCguApprovement()),
            'user_id' => htmlspecialchars($candidate->getClientId())
        ]);

        $candidate->setId($this->pdo->lastInsertId());
        return $candidate;
    }
}