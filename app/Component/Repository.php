<?php


namespace App\Component;

use PDO;

abstract class Repository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}