<?php
declare(strict_types=1);

namespace ContactDentalAid\ChiefComplaints\Core;

/**
 * Database Connection Manager
 * Handles multiple database drivers (SQLite, MySQL, PostgreSQL)
 */
class DatabaseConnection
{
    private \PDO $connection;
    private string $driver;
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->driver = $config['driver'];
        $this->connection = $this->createConnection();
    }

    private function createConnection(): \PDO
    {
        $dsn = match ($this->driver) {
            'sqlite' => 'sqlite:' . $this->config['path'],
            'mysql' => sprintf(
                'mysql:host=%s;port=%d;dbname=%s;charset=%s',
                $this->config['host'],
                $this->config['port'],
                $this->config['database'],
                $this->config['charset'] ?? 'utf8mb4'
            ),
            'pgsql' => sprintf(
                'pgsql:host=%s;port=%d;dbname=%s',
                $this->config['host'],
                $this->config['port'],
                $this->config['database']
            ),
            default => throw new \InvalidArgumentException("Unsupported driver: {$this->driver}"),
        };

        $pdo = new \PDO(
            $dsn,
            $this->config['username'] ?? null,
            $this->config['password'] ?? null,
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );

        if ($this->driver === 'mysql') {
            $pdo->exec('SET SESSION sql_mode="STRICT_TRANS_TABLES"');
        }

        return $pdo;
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }

    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function close(): void
    {
        $this->connection = null;
    }
}
