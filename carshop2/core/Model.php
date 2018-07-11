<?php
abstract class Model
{
	protected $table = null;
	protected $db    = null;

    /**
     * Model constructor.
     * @param PDO $db
     */
	public function __construct(PDO $db){
		$this->db = $db;
	}

}