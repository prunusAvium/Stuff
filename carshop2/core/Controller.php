<?php
abstract class Controller{

    /**
     * @var null|PDO
     */
	protected $db    = null;
	protected $input = null;

    /**
     * Controller constructor.
     * @param PDO $db
     */
	public function __construct(PDO $db)
    {
		if(isset($_GET['input'])){
			$this->input = $_GET['input'];
		} elseif (isset($_GET["addSale"])) {
		    $this->input = $_GET["addSale"];
        } elseif (isset($_GET["search"])) {
		    $this->input = $_GET["search"];
        } elseif (isset($_GET["customers"])) {
		    $this->input = $_GET["customers"];
        } elseif (isset($_GET["cars"])) {
            $this->input = $_GET["cars"];
        } elseif (isset($_GET["update_type"])) {
		    $this->input = $_GET["update_type"];
        } elseif (isset($_GET["update"])) {
		    $this->input = $_GET["update"];
        }
        $this->db = $db;
	}
	
	abstract public function main();

}