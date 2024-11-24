<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    private function __construct() {}

    public static function getConnection()
    {
        if (self::$instance === null) {
            try {
                // Load database config
                $config = require '../config/database.php';

                // Create a new PDO instance with the port
                $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
                self::$instance = new PDO(
                    $dsn,
                    $config['username'],
                    $config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
