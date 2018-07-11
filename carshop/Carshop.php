<?php
class Carshop
{
    private $db = false;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function main()
    {
        do{
            $input_str = trim(fgets(STDIN));
            $input_arr = explode(",", $input_str);
            //Sample: Audi, A4, 2004, Ivan, Ivanov, BGN 7000
            if(count($input_arr)  == 6){
                $car = [
                    'make' => $input_arr[0],
                    'model'=> $input_arr[1],
                    'year' => $input_arr[2],
                ];
                $person = [
                    'name' =>  $input_arr[3],
                    'family' => $input_arr[4]
                ];
                $amount = [
                    'amount' => str_replace('BGN ', "", $input_arr[5])
                ];
                $sale_id = $this->setSale($car, $person, $amount);
                if ($sale_id){
                    echo $this->getSale($sale_id);
                }
            } elseif (count($input_arr) == 1 & strtolower($input_arr[0] == 'sales')){
                echo $this->getSales();
            } /*elseif (count($input_arr) == 1 & strtolower($input_arr[0] != 'sales')){
                echo $this->getSalesUseMySQLFunction();
            }*/
        }
        while($input_str != "Bye");
    }
    /*$result = $this->db->query('CALL get_sales', PDO::FETCH_ASSOC);
foreach ($result as $row) {
    // Todo
}*/

    public function getSalesUseMySQLProcedure() //Problem 4. Use MySQL Procedure
    {
        try {
            $stmt = $this->db->query('CALL get_sales', PDO::FETCH_ASSOC);
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function getSalesUseMySQLFunction() //Problem 5. Use MySQL Function
    {
        try {
            $stmt = $this->db->prepare("
                SELECT get_full_name(first_name, family_name) AS full_name
                FROM customers");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    protected function getSales()
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM `deal`");
        $stmt->execute();
        $out = "";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //Audi, A4, 2017-01-24 10:13, 7000
            // BMW, 116, 2017-01-24 10:45,  24000
            //Ford, Focus, 2004, 2017-01-25 14:34, BGN 3800
            //---------
            //Total: 34800
            $out .= $row['make'] . "," ;
            $out .= $row['model'] . "," ;
            $out .= $row['year'] . "," ;
            $out .= $row['date_time'] . "," . PHP_EOL;
            $out .= "Sold to [name]";
            $out .= $row['amount'] . PHP_EOL;
        }
        $out .= "--------" . PHP_EOL;
        $stmt = $this->db->prepare("
            SELECT SUM(`amount`) AS `total_amount`
            FROM `sales`");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row){
            $out .= "Total: " . $row['total_amount'] . PHP_EOL;
        }
        return $out;
    }

    protected function getSale($sale_id)
    {
        $stmt = $this->db->prepare("
            SELECT `date_time`
                FROM `sales`
                WHERE `id` = $sale_id");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return "New sale entered " . $row['date_time'] . PHP_EOL;
        }
    }

    protected function setSale($car, $person, $amount)
    {
        try {

            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `cars`
                (`id`,`make`, `model`, `year`)
              VALUES
                (?, ?, ?, ?)");
            $car_id = "null";
            $stmt->bindParam(1, $car_id);
            $stmt->bindParam(2, $car['make']);
            $stmt->bindParam(3, $car['model']);
            $stmt->bindParam(4, $car['year']);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
            // Insert into customers
            $stmt = $this->db->prepare("
              INSERT INTO `customers`
                (`first_name`,`family_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $person['name']);
            $stmt->bindParam(2, $person['family']);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            // Todo
            // Insert into sales
            // Todo
            $stmt = $this->db->prepare("
              INSERT INTO `sales`
                (`amount`, `car_id`, `customer_id`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $amount['amount']);
            $stmt->bindParam(2, $car_id);
            $stmt->bindParam(3, $customer_id);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            $this->db->commit();
            return($sale_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}