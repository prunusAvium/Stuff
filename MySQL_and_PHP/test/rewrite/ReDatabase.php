<?php

declare(strict_types=1);

class ReDatabase extends PDO
{

    private $db_host = "localhost";
    private $db_name = "geography";
    private $db_user = "root";
    private $db_password = "password";

    public function __construct()
    {
        parent::__construct("mysql:dbname=$this->db_name;host=$this->db_host;charset=utf8", $this->db_user, $this->db_password);
    }

    public function setErrorException()
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function connect()
    {
        $this->setErrorException();
        return $this;
    }
}