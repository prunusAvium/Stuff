<?php
/**
 * Created by PhpStorm.
 * User: al3ex
 * Date: 24.5.2018 г.
 * Time: 13:18 ч.
 */

namespace Database;


class PDOResultSet implements ResultSetInterface
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

    public function fetch($className): \Generator
    {
        while ($row = $this->pdostatement->fetchObject($className)){
            yield $row;
        }
    }
}