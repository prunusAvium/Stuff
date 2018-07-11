<?php
declare(strict_types=1);
class ProjectsModel extends Model
{
    private $name;
    private $description;
    private $end_date;
    /**
     * ProjectsModel constructor.
     * @param PDO $db
     * @param string|null $name
     * @param string|null $description
     * @param string|null $end_date
     */
    public function __construct(PDO $db, string $name = null, string $description = null, string $end_date = null)
    {
        parent::__construct($db);
        $this->table = "projects";
        if ($name != null && $description != null && $end_date != null) {
            $this->setName($name);
            $this->setDescription($description);
            $this->setEndDate($end_date);
        }
    }
    /**
     * @return int
     */
    public function create(): int
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO `" . $this->table . "`(`name`, `description`, `end_date`, `start_date`)
                VALUES(?, ?, ?, NOW())
            ");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->description);
            $stmt->bindParam(3, $this->end_date);
            $stmt->execute();
            return intval($this->db->lastInsertId());
        } catch (Exception $e) {
            $e->getMessage();
            include "view/page_not_found.php";
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
                FROM get_proj_empl
                WHERE employee_id = ?
            ");
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
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }
    /**
     * @param string $description
     */
    private function setDescription(string $description)
    {
        $this->description = $description;
    }
    /**
     * @param string $end_date
     */
    private function setEndDate(string $end_date)
    {
        $this->end_date = $end_date;
    }
}