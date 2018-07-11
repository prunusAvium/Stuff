<?php
declare(strict_types=1);
class EmployeeController extends Controller
{
    public function main()
    {
        //$this->view();
        header("Location:?controller=EmployeeController&action=view");
    }
    public function view()
    {
        $m = new EmployeesModel($this->db);
        $res = $m->readAll();
        $this->loadView("header.php");
        $this->loadView("employee/view_all.php", $res);
        $this->loadView("footer.php");
    }
    public function addProject()
    {
        if (isset($this->inputGet()["employee_id"]) && isset($this->inputPost()["save"]) &&
            strlen(trim($this->inputPost()["name"])) && strlen(trim($this->inputPost()["description"])) &&
            strlen(trim($this->inputPost()["end_date"]))) {
            try {
                $this->db->beginTransaction();
                $p = new ProjectsModel($this->db, trim($this->inputPost()["name"]),
                    trim($this->inputPost()["description"]), trim($this->inputPost()["end_date"]));
                $project_id = $p->create();
                $e = new EmployeesProjectsModel($this->db, intval($this->inputGet()["employee_id"]), $project_id);
                $e->create();
                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                $e->getMessage();
                include "view/page_not_found.php";
            }
        }
        if (isset($this->inputPost()['cancel'])) {
            header("Location: ?controller=EmplyeeController");
        }
        if (isset($_POST['employee_id']) and intval($_POST['employee_id']) <= 20) {
            echo "You made it to the top employees this month! Congratulations";
        }

        if (isset($this->inputPost()["cancel"])) {
            header("Location: ?controller=EmployeeController");
        }
        $this->loadView("header.php");
        $this->loadView("employee/add_project.php");
        $this->loadView("footer.php");
    }
    public function viewProjects()
    {
        if (isset($this->inputGet()["employee_id"])) {
            try {
                $p = new ProjectsModel($this->db);
                $result = $p->read(intval($this->inputGet()["employee_id"]));
                $this->loadView("header.php");
                $this->loadView("employee/view_projects_per_employee.php", $result);
                $this->loadView("footer.php");
            } catch (Exception $e) {
                $e->getMessage();
                include "view/page_not_found.php";
            }
        }
    }
}