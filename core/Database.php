<?php

namespace app\core;

use app\migrations;

use PDO;

class Database
{
    private $host = "127.0.0.1";
    private $user = "root";
    private $pwd = "";
    private $dbName = "itemsDatabase";
    public PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }



    public function applyMigrations()
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . '/migrations');

        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration  === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $this->logMigration("Applying migration $migration");
            $instance->up();
            $this->logMigration("Applying migration $migration");
            $newMigrations[] = $migration;
        }
        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->logMigration("All migrations are applied");
        }
    }

    public function createMigrationTable()
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {

        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));

        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str ");

        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    protected function logMigration($message)
    {
        echo  '[' . date("Y-m-d H:i:s") . '] - ' . $message . PHP_EOL;
    }
}
