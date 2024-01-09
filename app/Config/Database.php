<?php
namespace App\Config;

use Dotenv\Dotenv;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct($host, $user, $password, $dbname)
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );

        try {
            // echo "Attempting to connect to the database...\n";
            $this->pdo = new \PDO($dsn, $user, $password, $options);
            // echo "Database connection established successfully\n";
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = self::createInstanceFromEnv();
        }
        return self::$instance;
    }

    private static function createInstanceFromEnv()
    {
        $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_DATABASE'];

        // echo "Host: " . $host . "\n";
        // echo "User: " . $user . "\n";
        // echo "Password: " . $password . "\n";
        // echo "Database Name: " . $dbname . "\n";

        return new self($host, $user, $password, $dbname);
    }


    public function getPdo()
    {
        return $this->pdo;
    }
}



