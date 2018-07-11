<?php
declare(strict_types=1);
class EmployeesProjectsModel extends Model
{
    private $employee_id;
    private $project_id;
    /**
     * EmployeesProjectsModel constructor.
     * @param PDO $db
     * @param int $employee_id
     * @param int $project_id
     */
    public function __construct(PDO $db, int $employee_id = 0, int $project_id = 0)
    {
        parent::__construct($db);
        $this->table = "employees_projects";
        if ($employee_id > 0 && $project_id > 0) {
            $this->setEmployeeId($employee_id);
            $this->setProjectId($project_id);
        }
    }
    public function create()
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO `" . $this->table . "`(employee_id, project_id)
                VALUES(?, ?)
            ");
            $stmt->bindParam(1, $this->employee_id);
            $stmt->bindParam(2, $this->project_id);
            $stmt->execute();
        } catch (Exception $e) {
            $e->getMessage();
            include "view/page_not_found.php";
        }
    }
    /**
     * @param int $employee_id
     */
    private function setEmployeeId(int $employee_id)
    {
        $this->employee_id = $employee_id;
    }
    /**
     * @param int $project_id
     */
    private function setProjectId(int $project_id)
    {
        $this->project_id = $project_id;
    }
}