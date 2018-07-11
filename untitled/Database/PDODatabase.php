<?php
/**
 * Created by PhpStorm.
 * User: al3ex
 * Date: 23.5.2018 г.
 * Time: 19:48 ч.
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);
    }

    public function getLastError(): array
    {
        // TODO: Implement getLastError() method.
    }
}
