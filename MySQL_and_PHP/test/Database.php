<?php
/*$db_hostname = "localhost";
$db_username = "root";
$db_password = "password";
$db_database = "geography_database";

$db = new mysqli($db_hostname, $db_uername, $db_password, $db_database);*/
declare(strict_types=1);

class Database extends PDO
{
    private $db_host = "localhost";
    private $db_name = "geography";
    private $db_user = "root";
    private $db_password = "password";

    /*private $db          = false;*/
    public function __construct()
    {
        parent::__construct("mysql:dbname=$this->db_name;host=$this->db_host;charset=utf8", $this->db_user, $this->db_password);
    }

    // Methods
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