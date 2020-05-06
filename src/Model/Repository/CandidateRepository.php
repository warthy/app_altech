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
        $stmt = $this->pdo->prepare('SELECT * FROM '. self::TABLE_NAME .' WHERE client_id = :client_id');
        $stmt->bindValue(':client_id', $client->getId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::ENTITY);
    }

    
    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
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
            'firstname' => $candidate->getFirstname(),
            'lastname' => $candidate->getLastname(),
            'sex' => $candidate->getSex(),
            'height' => $candidate->getHeight(),
            'weight' => $candidate->getWeight(),
            'email' => $candidate->getLastname(),
            'phone' => $candidate->getPhone(),
            'cgu_approvement' => $candidate->getCguApprovement(),
            'user_id' => $candidate->getClientId()
        ]);

        $candidate->setId($this->pdo->lastInsertId());
        return $candidate;
    }
}