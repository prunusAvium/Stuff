<?php
declare(strict_types=1);
class TownModel extends Model
{
    private $town;
    /**
     * TownModel constructor.
     * @param PDO $db
     * @param string|null $town
     */
    public function __construct(PDO $db, string $town = null)
    {
        parent::__construct($db);
        $this->table = "towns";
        if ($town != null) {
            $this->setTown($town);
        }
    }
    /**
     * @param int $employee_id
     */
    public function editTown(int $employee_id)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE `" . $this->table . "`AS t
                INNER JOIN addresses AS a
                USING(town_id)
                INNER JOIN employees AS e
                ON e.address_id = a.address_id
                SET t.name = ?
                WHERE e.employee_id = ?
            ");
            $stmt->bindParam(1, $this->town);
            $stmt->bindParam(2, $employee_id);
            $stmt->execute();
        } catch (Exception $e) {
            $e->getMessage();
            include "view/page_not_found.php";
        }
    }
    /**
     * @param string $town
     */
    private function setTown(string $town)
    {
        $this->town = $town;
    }
}