<?php
declare(strict_types=1);

class SalesModel extends Model{
	private $date_time;
	private $amount;
	private $car_id;
	private $customer_id;
    private $currency = null;

    public function __construct(PDO $db,
                                int $car_id = null, int $customer_id = null,
                                float $amount = null, string $currency = null, string $date_time = null)
    {
        parent::__construct($db);
        $this->table = "sales";
        if ($car_id != null && $customer_id != null) {
            $this->setCarId($car_id);
            $this->setCustomerId($customer_id);
        }
        if ($amount != null) {
            $this->setAmount($amount);
        }
        if ($date_time != null) {
            $this->setDateTime($date_time);
        }
        if ($currency != null) {
            $this->setCurrency($currency);
        }
    }

    public function create()
	{
        // Insert into sales
		try{
            $stmt = $this->db->prepare("
                INSERT INTO `sales`
                  (`date_time`,`amount`,`car_id`,`customer_id`)
                VALUES 
                   (NOW(), ?, ?, ?)");
            $stmt->bindParam(1, $this->amount);
            $stmt->bindParam(2, $this->car_id);
            $stmt->bindParam(3, $this->customer_id);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            $this->db->commit();
            return($sale_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}
	// Todo - problem 1
    // Modifications to create()

    // Todo - problem 1
    // Modifications to create()
    public function readLastIdDateTime(int $sale_id)
    {
        try {
            $stmt = $this->db->prepare("
              SELECT `date_time_sale`         
                FROM `" . $this->table . "`
              WHERE sale_id = ?");
            $stmt->bindParam(1, $sale_id);
            $stmt->execute();
            $dt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($dt);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }
	
	public function readAll()
	{
        try {
            $stmt = $this->db->prepare("
              SELECT *         
                FROM `deal`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch(PDOException $e){
		    print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
	}
	
	public function readTotal()
	{
        $stmt = $this->db->prepare("
            SELECT SUM(`amount`) as `total_amount`
              FROM `sales`");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['total_amount'])
			return $row['total_amount'];
		else
			return false;
	}

    // Todo - problem 8
    public function update(int $sale_id): bool
    {
        try {
            $stmt = null;
            if ($this->currency == null) {
                $stmt = $this->db->prepare("
                UPDATE `" . $this->table . "`
                SET `date_time_sale` = ?, `amount` = ?
                WHERE `sale_id` = ?
                ");
                $stmt->bindParam(1, $this->date_time);
                $stmt->bindParam(2, $this->amount);
                $stmt->bindParam(3, $sale_id);
            } else {
                $stmt = $this->db->prepare("
                UPDATE `" . $this->table . "`
                SET `date_time_sale` = ?, `amount` = ?, `currency` = ?
                WHERE `sale_id` = ?
                ");
                $stmt->bindParam(1, $this->date_time);
                $stmt->bindParam(2, $this->amount);
                $stmt->bindParam(3, $this->currency);
                $stmt->bindParam(4, $sale_id);
            }
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
     * @param string $date_time
     */
    private function setDateTime(string $date_time)
    {
        $this->date_time = $date_time;
    }
    /**
     * @param float $amount
     */
    private function setAmount(float $amount)
    {
        $this->amount = $amount;
    }
    /**
     * @param int $car_id
     */
    private function setCarId(int $car_id)
    {
        $this->car_id = $car_id;
    }
    /**
     * @param int $customer_id
     */
    private function setCustomerId(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }
    /**
     * @param string $currency
     */
    private function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

}