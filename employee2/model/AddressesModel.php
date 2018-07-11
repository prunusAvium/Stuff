<?php
declare(strict_types=1);
class AddressesModel extends Model
{
    private $address;
    /**
     * AddressesModel constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db, string $address = null)
    {
        parent::__construct($db);
        $this->table = "addresses";
        if ($address != null) {
            $this->setAddress($address);
        }
    }
    /**
     * @param int $id
     * @return array
     */
    public function read(int $id)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT *
                FROM get_addres_empl
                WHERE employee_id = ?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $all;
        } catch (Exception $e) {
            $e->getMessage();
            include "view/page_not_found.php";
        }
    }
    /**
     * @param int $employee_id
     */
    public function editAddress(int $employee_id)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE `" . $this->table . "` AS a
                INNER JOIN employees AS e
                USING(address_id)
                SET a.address_text = ?
                WHERE e.employee_id = ?");
            $stmt->bindParam(1, $this->address);
            $stmt->bindParam(2, $employee_id);
            $stmt->execute();
        } catch (Exception $e) {
            $e->getMessage();
            include "view/page_not_found.php";
        }
    }
    /**
     * @param string $address
     */
    private function setAddress(string $address)
    {
        $this->address = $address;
    }
}