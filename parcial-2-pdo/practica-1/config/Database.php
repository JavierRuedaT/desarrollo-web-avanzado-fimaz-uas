<?php
namespace Config;

use PDO;
use PDOException;

class Database {
    private $connection;

    public function __construct() {
        try {
            $dsn = "mysql:host=localhost;dbname=phppdobd;charset=utf8";
            $this->connection = new PDO($dsn, "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Error de conexión: ".$e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}