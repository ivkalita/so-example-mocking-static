<?php


namespace Example;


use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\DriverManager;

class Database
{
    private $connection = null;

    public function openNewConnection(string $database_name)
    {
        try {
            $connection_params = [];
            $config = [];
            $this->connection = DriverManager::getConnection($connection_params, $config);
        } catch (\Exception $e) {
            // catch the different errors that could be created
        }

        return $this->connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}