<?php
declare(strict_types=1);
class ReCallCenter
{
    private $db_inst = false;
    public function connectDB()
    {
        $db = new ReDatabase();
        $this->db_inst = $db->connect();
    }
    public function __construct()
    {
        $this->connectDB();
    }
    //Main function wraping
    public function main(float $n)
    {
        if ($n == 7) { // Problem 7. Call Center Application
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getCallCenterApplication($input_str);
            }
        } elseif ($n == 7.1) { // Problem 7.1 Add Currency and Continent
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getAddCurrencyAndContinent($input_str);
            }
        } elseif ($n == 7.2) { // Problem 7.2. Customers in the Mountain
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getCustomersInTheMountain($input_str);
            }
        } elseif ($n == 7.3) { // Problem 7.3. Special Ski Equipment
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getSpecialSkiEquipment($input_str);
            }
        } elseif ($n >= 9 && $n < 12) {
            // Problem 9. Add Customer Functionality, Problem 10. Delete Customer Functionality
            // Problem 11. Customers in Specific Country*, Problem 12. Customers in Specific Continent**
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $tokens = explode(' ', $input_str);
                $command = trim($tokens[0]);
                if ($command == "Customer") {
                    $iso = $this->addCustomer($input_str);

                }
            }
        }
        /*elseif ($n >= 9 && $n < 12) {
            // Problem 9. Add Customer Functionality, Problem 10. Delete Customer Functionality
            // Problem 11. Customers in Specific Country*, Problem 12. Customers in Specific Continent**
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $tokens = explode(' ', $input_str);
                $command = trim($tokens[0]);
                if ($command == "Customer") {
                    $iso = $this->addCustomer($input_str);
                    $this->getAddCurrencyAndContinent($iso[0]);
                    $this->getCustomerISO(intval($iso[1]));
                } elseif (explode(',', $command)[0] == "Remove") {
                    $this->delCustomer($input_str);
                } elseif ($command == "Customers" && count($tokens) == 3) {
                    echo substr(trim($input_str), 0, -1) . ":" . PHP_EOL;
                    $this->getCustomersInCountry(substr(trim($tokens[2]), 0, -1));
                } elseif ($command == "Customers" && count($tokens) == 4) {
                    $this->getCustomersInContinent(substr(trim($tokens[3]), 0, -1));
                }
            }*/
    }
    private function delCustomer(){
        //Todo
    }

    private function addCustomer(string $str): array
    {
        $tokens = explode(',', $str);
        $tokensISO = explode(' ', $tokens[0]);
    }
    /*private function addCustomer(string $str): array
    {
        $tokens = explode(',', $str);
        $tokensISO = explode(' ', $tokens[0]);
        if (count($tokens) != 3 && count($tokensISO) != 2) {
            exit("Input ERROR");
        }
        $fName = trim($tokens[1]);
        $lName = trim($tokens[2]);
        $iso = "";
        $stmt = $this->getCountryISO(trim($tokensISO[1]));
        foreach ($stmt as $value) {
            $iso = $value["country_code"];
            break;
        }
        if (strlen($iso) == 0) {
            exit("Exception: Country doesn't exist.");
        }
        $stmt = null;
        $stmt = $this->db_inst->prepare("
            INSERT INTO `customer` (customer_name, customer_family, country_code)
                VALUE (?, ?, ?)");
        $customer_name = $fName;
        $customer_family = $lName;
        $country_code = $iso;
        $stmt->execute([$customer_name, $customer_family, $country_code]);
        $id = $this->db_inst->lastInsertId();
        return array($iso, "$id");
    }*/
    private function getSpecialSkiEquipment(string $input_str)
    {
        $res = $this->getCurrencyAndContinent($input_str);
        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL;
            echo "Currency: " . $value["description"] . PHP_EOL;
            echo "Continent: " . $value["continent_name"] . PHP_EOL . PHP_EOL;
            if ($this->isMountainCountry($value["country_code"])) {
                echo "Forward customer for special offers!" . PHP_EOL;
            }
            if ($this->isSpecialEquipment($value["country_code"])) {
                echo "Show high mountain special equipment offers!" . PHP_EOL;
            }
            $hasDB = true;
        }
        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }
    private function isSpecialEquipment(string $str): bool
    {
        $stmt = $this->db_inst->query("
            SELECT m.mountain_range, p.peak_name, p.elevation
	          FROM `mountains` AS m
		        JOIN `mountains_countries` AS mc
	 		      ON m.id = mc.mountain_id
	 	        JOIN `peaks` AS p
	 		      ON m.id = p.mountain_id
		        WHERE p.elevation > 4000
			      AND mc.country_code = '$str'");
        $hasStmt = false;
        foreach ($stmt as $value) {
            $value;
            $hasStmt = true;
        }
        if ($hasStmt) {
            return true;
        }
        return false;
    }
    private function getCustomersInTheMountain(string $input_str)
    {
        $res = $this->getCurrencyAndContinent($input_str);
        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL;
            echo "Currency: " . $value["description"] . PHP_EOL;
            echo "Continent: " . $value["continent_name"] . PHP_EOL . PHP_EOL;
            if ($this->isMountainCountry($value["country_code"])) {
                echo "Forward customer for special offers!" . PHP_EOL;
            }
            $hasDB = true;
        }
        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }
    private function isMountainCountry(string $str): bool
    {
        $stmt = $this->db_inst->query("
            SELECT m.mountain_range
                FROM `mountains` AS m
                  JOIN `mountains_countries` AS mc
                    ON m.id = mc.mountain_id
                  WHERE mc.country_code = '$str'");
        $hasStmt = false;
        foreach ($stmt as $value) {
            $value;
            $hasStmt = true;
        }
        if ($hasStmt) {
            return true;
        }
        return false;
    }
    private function getAddCurrencyAndContinent(string $input_str)
    {
        $res = $this->getCurrencyAndContinent($input_str);
        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL;
            echo "Currency: " . $value["description"] . PHP_EOL;
            echo "Continent: " . $value["continent_name"] . PHP_EOL . PHP_EOL;
            $hasDB = true;
        }
        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }
    private function getCurrencyAndContinent(string $str)
    {
        $stmt = $this->db_inst->query("
            SELECT cy.country_name, cy.capital, cr.description, ct.continent_name, cy.country_code
                FROM `countries` AS cy
                    JOIN  `continents` AS ct
                      ON cy.continent_code = ct.continent_code
                    JOIN `currencies` AS cr
                      ON cy.currency_code = cr.currency_code
                    WHERE cy.country_code = '$str'
                      OR	cy.iso_code = '$str'");
        return $stmt;
    }
    private function getCallCenterApplication(string $input_str)
    {
        $res = $this->getCountryInfo($input_str);
        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL . PHP_EOL;
            $hasDB = true;
        }
        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }
    private function getCountryInfo(string $str)
    {
        $stm = $this->db_inst->query("
            SELECT `country_name`, `capital`
                FROM `countries`
                  WHERE `country_name` = '$str'
                    OR `country_code` = '$str'
                      OR `iso_code` = '$str'
                     LIMIT 0,1");
        return $stm;
    }
}