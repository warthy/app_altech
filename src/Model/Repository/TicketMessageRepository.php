<?php
namespace Altech\Model\Repository;

use Altech\Model\Entity\Ticket;
use Altech\Model\Entity\TicketMessage;
use App\Component\Repository;
use PDO;

class TicketMessageRepository extends Repository
{
    const TABLE_NAME = "ticket_message";
    const ENTITY = TicketMessage::class;

    public function findAllByTicket(Ticket $ticket){
        $stmt = $this->pdo->prepare('SELECT * FROM '. self::TABLE_NAME .' WHERE ticket_id = :ticket_id ORDER BY sent_at ASC');
        $stmt->bindValue(':ticket_id', $ticket->getId(), PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::ENTITY);
    }

    public function update( $entity): void
    {
        // TODO: Implement update() method.
    }

    /**
     * @param TicketMessage $tm
     * @return TicketMessage
     */
    public function insert($tm): TicketMessage
    {
        $stmt = $this->pdo->prepare('INSERT INTO ' . self::TABLE_NAME .
            ' (message, ticket_id, author_id, sent_at) VALUES (:message, :ticket_id, :author_id, NOW())'
        );
        $stmt->bindValue(':message', htmlspecialchars($tm->getMessage()));
        $stmt->bindValue(':ticket_id', $tm->getTicketId());
        $stmt->bindValue(':author_id', $tm->getAuthorId());

        $stmt->execute();
        $tm->setId($this->pdo->lastInsertId());

        return $tm;
    }
}