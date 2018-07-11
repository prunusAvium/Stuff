<?php
declare(strict_types=1);
class EmployeesModel extends Model
{
    /**
     * EmployeesModel constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->table = "employees";
    }
    /**
     * @return array
     */
    public function readAll()
    {
        try {
            $stmt = $this->db->prepare("
                SELECT *
                FROM `" . $this->table . "`
            ");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (Exception $e) {
            $e->getMessage();
            include "view/page_not_found.php";
        }
    }
}