<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\FAQ;
use App\Component\Repository;
use PDO;

class FAQRepository extends Repository
{

    public function findAllQuestions(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM frequent_question');
        return $stmt->fetchAll(PDO::FETCH_CLASS, FAQ::class);
    }

    public function findOneQuestionById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM frequent_question WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(FAQ::class);
    }

}