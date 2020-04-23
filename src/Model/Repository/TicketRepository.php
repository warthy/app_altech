<?php
namespace Altech\Model\Repository;

use Altech\Model\Entity\EntityInterface;
use Altech\Model\Entity\Ticket;
use App\Component\Repository;

class TicketRepository extends Repository
{
    const TABLE_NAME = "ticket";
    const ENTITY = Ticket::class;

    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
    }

    public function insert(EntityInterface $entity)
    {
        // TODO: Implement insert() method.
    }
}