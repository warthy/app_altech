<?php
namespace Altech\Model\Repository;

use Altech\Model\Entity\EntityInterface;
use Altech\Model\Entity\TicketMessage;
use App\Component\Repository;

class TicketMessageRepository extends Repository
{
    const TABLE_NAME = "ticket_message";
    const ENTITY = TicketMessage::class;

    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
    }

    public function insert(EntityInterface $entity)
    {
        // TODO: Implement insert() method.
    }
}