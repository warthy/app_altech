<?php

namespace App\KernelFoundation;

use App\Component\Repository;
use Exception;
use PDO;
use PDOException;

class Database
{
    /**
     * @var PDO
     */
    private $PDOInstance;

    /**
     * @var null|Database
     */
    private static $_instance = null;


    public function __construct($host, $username, $password, $database)
    {
        try {
            $this->PDOInstance = new PDO(
                "mysql:dbname=$database;host=$host",
                $username,
                $password,
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );
            $this->PDOInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->PDOInstance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e) {
            throw new Exception("[Connection issue]: $e");
        }
    }

    public static function getRepository(string $class): Repository
    {
        if (!is_null(self::$_instance)) {
            return new $class(self::$_instance->PDOInstance);
        }
        throw new Exception("Database instance hasn't been created");
    }


    public static function getInstance($host, $database, $user, $password): self
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Database($host, $database, $user, $password);
        }
        return self::$_instance;
    }

}