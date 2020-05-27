<?php

namespace App\Component;

use Altech\Model\Entity\EntityInterface;
use PDO;

abstract class Repository
{
    protected const DEFAULT_SIZE = 20;
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . static::TABLE_NAME . ' WHERE id =  :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject(static::ENTITY);
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM ' . static::TABLE_NAME);
        return $stmt->fetchAll(PDO::FETCH_CLASS, static::ENTITY);
    }



    public function remove(EntityInterface $entity)
    {
        $id = $entity->getId();

        $stmt = $this->pdo->prepare('DELETE FROM ' . static::TABLE_NAME . ' WHERE id =  :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    abstract public function update(EntityInterface $entity): void;

    abstract public function insert(EntityInterface $entity);
}