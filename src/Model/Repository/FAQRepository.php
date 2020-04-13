<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\FAQ;
use App\Component\Repository;

class FAQRepository extends Repository
{
    const TABLE_NAME = "frequent_question";
    const ENTITY = FAQ::class;


    public function findAllQuestions(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM ' . self::TABLE_NAME);
        return $stmt->fetchAll(PDO::FETCH_CLASS, FAQ::class);
    }

    public function findOneById(int $id): FAQ
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(FAQ::class);
    }

    /**
     * @param FAQ $faq
     */
    public function update($faq): void
    {
        $stmt = $this->pdo->prepare('UPDATE ' . self::TABLE_NAME . ' SET question = :question, answer = :answer WHERE id = :id');
        $stmt->execute([
            'id' => $faq->getId(),
            'question' => $faq->getQuestion(),
            'answer' => $faq->getAnswer()
        ]);
    }

    /**
     * @param FAQ $faq
     * @return FAQ
     */
    public function insert($faq): FAQ
    {
        $stmt = $this->pdo->prepare('INSERT INTO ' . self::TABLE_NAME . ' (question, answer) VALUES (:question, :answer)');
        $question = $faq->getQuestion();
        $answer = $faq->getAnswer();
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':answer', $answer);

        $stmt->execute();
        $faq->setId($this->pdo->lastInsertId());

        return $faq;
    }
}