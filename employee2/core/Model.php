<?php
declare(strict_types=1);

abstract class Model
{
    /**
     * @var null
     */
    protected $table = null;
    /**
     * @var null|PDO
     */
    protected $db = null;
    /**
     * Model constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}