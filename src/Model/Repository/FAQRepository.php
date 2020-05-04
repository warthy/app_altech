<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\FAQ;
use App\Component\Repository;

class FAQRepository extends Repository
{
    const TABLE_NAME = "faq";
    const ENTITY = FAQ::class;

    /**
     * @param FAQ $faq
     */
    public function update($faq): void
    {
        $stmt = $this->pdo->prepare('UPDATE ' . self::TABLE_NAME . ' SET question = :question, answer = :answer WHERE id = :id');
        $stmt->execute([
            'id' => htmlspecialchars($faq->getId()),
            'question' => htmlspecialchars($faq->getQuestion()),
            'answer' => htmlspecialchars($faq->getAnswer())
        ]);
    }

    /**
     * @param FAQ $faq
     * @return FAQ
     */
    public function insert($faq): FAQ
    {
        $stmt = $this->pdo->prepare('INSERT INTO ' . self::TABLE_NAME . ' (question, answer) VALUES (:question, :answer)');
        $stmt->bindValue(':question', htmlspecialchars($faq->getQuestion()));
        $stmt->bindValue(':answer', htmlspecialchars(($faq->getAnswer())));

        $stmt->execute();
        $faq->setId($this->pdo->lastInsertId());

        return $faq;
    }
}