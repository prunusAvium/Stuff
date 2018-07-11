<?php
declare(strict_types=1);

class CarsModel extends Model
{

    private $make;
    private $model;
    private $year;

    public function __construct(PDO $db, string $make = null, string $model = null, int $year = null)
    {
        parent::__construct($db);
        $this->table = "cars";

        if ($make != null && $model != null && $year != null) {
            $this->setMake($make);
            $this->setModel($model);
            $this->setYear($year);
        }
    }

    public function create()
    {
        try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `" . $this->table . "`
                (`make`, `model`, `year`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
            return $car_id;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
        return false;
    }
    // Todo - problem 3
    public function readCars()
    {
        // Read all cars
        try {
            $stmt = $this->db->prepare("
                SELECT `make`, `model`, `year`
                    FROM `" . $this->table . "`
                    ");
            $stmt->execute();
            $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cars;

        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
        return false;
    }

    // Todo - problem 6
    public function getCarOwner(string $make)
    {
        // Method/s to search for a car and owner. Use join
        try {
            $stmt = $this->db->prepare("
                SELECT `c`.`make`, `c`.`model`, `c`.`year`, `c`.`id`, 
                `cs`.`first_name`, `cs`.`last_name`, `cs`.`customer_id`
                FROM `sales` AS s
                INNER JOIN `cars` AS c
                ON `s`.`car_id` = `c`.`id`
                INNER JOIN `customers` AS cs
                USING (customer_id)
                WHERE `c`.`make` = ?
            ");
            $stmt->bindParam(1, $make);
            $stmt->execute();
            $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cars;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
        return false;
    }
    // Todo - problem 8
    public function update(int $cars_id): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE `" . $this->table . "`
                SET make = ?, model = ?, year = ?
                WHERE id = ?
            ");
            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);
            $stmt->bindParam(4, $cars_id);
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

    // Todo - problem 6
    // Method/s to search for a car and owner. Use join

    /**
     * @param string $make
     */
    public function setMake(string $make)
    {
        $this->make = $make;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year)
    {
        $this->year = $year;
    }




}