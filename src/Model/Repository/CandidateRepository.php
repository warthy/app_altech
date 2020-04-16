<?php

namespace Altech\Model\Repository;

use Altech\Model\Entity\Candidate;
use Altech\Model\Entity\EntityInterface;
use App\Component\Repository;

class CandidateRepository extends Repository
{
    const TABLE_NAME = "candidate";
    const ENTITY = Candidate::class;

    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
    }

    public function insert(EntityInterface $entity)
    {
        // TODO: Implement insert() method.
    }
}