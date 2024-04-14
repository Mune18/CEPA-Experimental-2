<?php

// Set default time zone
date_default_timezone_set("Asia/Manila");

// Set time limit of requests
set_time_limit(1000);

// Define constants for server credentials/configuration
define("SERVER", "localhost");
define("DATABASE", "cepa_db");
define("USER", "root");
define("PASSWORD", "");
define("DRIVER", "mysql");

class DatabaseConnection {
    private $connectionString;
    private $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false
    ];
    private $pdo;

    public function __construct() {
        $this->connectionString = DRIVER . ":host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8mb4";
    }

    public function connect() {
        try {
            $this->pdo = new \PDO($this->connectionString, USER, PASSWORD, $this->options);
            return $this->pdo;
        } catch(\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>
