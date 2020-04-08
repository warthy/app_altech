<?php

namespace App\Component;

use Altech\Model\Entity\EntityInterface;
use PDO;

abstract class Repository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function remove(EntityInterface $entity){
        $stmt = $this->pdo->prepare('DELETE FROM ' . static::TABLE_NAME . ' WHERE id =  :id');
        $stmt->bindParam(':id', $entity->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    abstract public function update(EntityInterface $entity): void;
    abstract public function insert(EntityInterface $entity);
}