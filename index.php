<?php

require_once(__DIR__ . '/vendor/autoload.php');

$driver = new \Doctrine\DBAL\Driver\PDOPgSql\Driver();
$mocked_connection = new \Doctrine\DBAL\Connection([], $driver);

// use Mockery to simulate static call
$driver_manager = Mockery::mock('alias:\Doctrine\DBAL\DriverManager');
$driver_manager->shouldReceive('getConnection')
    ->once()
    ->andReturn($mocked_connection);

$database = new \Example\Database();
$database->openNewConnection('test_db_cluster_01');

assert($mocked_connection === $database->getConnection());