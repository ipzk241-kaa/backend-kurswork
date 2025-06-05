<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    protected $pdo;
    private static $instance = null;
    public function __construct() {
        $config = require __DIR__ . '/../../config/database.php';

        try {
            $this->pdo = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
                $config['username'],
                $config['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('DB Connection failed: ' . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

        public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}
