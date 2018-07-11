<?php

namespace Database;


class PDOPreparedStatement implements StatementInterface
{
    /** @var \PDOStatement */
    private $pdostatement;

    /**
     * PDOPreparedStatement constructor.
     * @param \PDOStatement $pdostatement
     */
    public function __construct(\PDOStatement $pdostatement)
    {
        $this->pdostatement = $pdostatement;
    }


    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdostatement->execute($params);
        return new PDOResultSet($this->pdostatement);
    }
}