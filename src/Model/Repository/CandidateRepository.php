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

<<<<<<< HEAD
    public function findAllOfUser($page): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE user_id = :user_id');
        
        return $stmt->fetchAll(PDO::FETCH_CLASS, Candidate::class);
    }

    public function findById(int $id): Candidate
    {
        /** @var Candidate $candidate */
        $candidate = parent::findById($id);
        $stmt = $this->pdo->prepare('SELECT * FROM ' . UserRepository::TABLE_NAME . ' WHERE id = :id');
        $stmt->execute(["id" => $candidate->user_id]);
=======
    public function findAllOfUser(User $client) {
        $stmt = $this->pdo->prepare('SELECT * FROM '. self::TABLE_NAME .' WHERE client_id = :client_id');
        $stmt->bindValue(':client_id', $client->getId(), PDO::PARAM_INT);
        $stmt->execute();
>>>>>>> ec3e8efe7bc0821e9d80c13bffe1a8295ce717a4

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
            'user_id' => $candidate->getClient()->getId()
        ]);

        $candidate->setId($this->pdo->lastInsertId());
        return $candidate;
    }
}