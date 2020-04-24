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

    public function insert( $entity)
    {
        // TODO: Implement insert() method.
    }
}