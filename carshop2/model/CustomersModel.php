<?php
declare(strict_types=1);

class CustomersModel extends Model
{
	private $name;
	private $family;
    /**
     * CustomersModel constructor.
     * @param PDO $db
     * @param string $name
     * @param string $family
     */
    public function __construct(PDO $db, string $name = null, string $family = null)
    {
        parent::__construct($db);
        $this->table = "customers";
        if ($name != null && $family != null) {
            $this->setName($name);
            $this->setFamily($family);
        }
    }

	public function create()
	{
		// Insert into customers
		try{
            $stmt = $this->db->prepare("
              INSERT INTO `".$this->table."`
                (`first_name`, `family_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->family);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            return($customer_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
        return false;
	}
    //Todo - problem 2
    public function getAll()
    {
        // Read all customers
        try {
            $sql = 'SELECT * FROM ' . $this->table;
            $query = $this->db->prepare($sql);
            $query->execute();

            /*$stmt = $this->db->prepare("
              SELECT `first_name`, `last_name` 
              FROM `" . $this->table . "`
              ");
            $stmt->execute();
            $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
    // Todo - problem 8
    public function update(int $customer_id): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE `" . $this->table . "`
                SET `first_name` = ?, `last_name` = ?
                WHERE `customer_id` = ?
            ");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->family);
            $stmt->bindParam(3, $customer_id);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }

    /**
     * @param string  $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $family
     */
    public function setFamily(string $family)
    {
        $this->family = $family;
    }

	//Todo - problem 2
    // Read all customers


}