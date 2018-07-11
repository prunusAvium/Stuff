<?php
declare(strict_types=1);
class AddressController extends Controller
{
    public function main()
    {
    }
    public function viewAddresses()
    {
        if (isset($_GET["employee_id"])) {
            try {
                $p = new AddressesModel($this->db);
                $result = $p->read(intval($this->inputGet()["employee_id"]));
                $this->loadView("header.php");
                $this->loadView("employee/view_employee_address.php", $result);
                $this->loadView("footer.php");
            } catch (Exception $e) {
                $e->getMessage();
                include "page_not_found.php";
            }
        }
    }
    public function editAddress()
    {
        if (isset($this->inputGet()["employee_id"]) && isset($this->inputPost()["save"]) &&
            strlen(trim($this->inputPost()["address"])) && strlen(trim($this->inputPost()["town"]))) {
            try {
                $this->db->beginTransaction();
                $a = new AddressesModel($this->db, trim($this->inputPost()["address"]));
                $a->editAddress(intval($this->inputGet()["employee_id"]));
                $t = new TownModel($this->db,trim($this->inputPost()["town"]));
                $t->editTown(intval($this->inputGet()["employee_id"]));
                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                $e->getMessage();
                include "page_not_found.php";
            }
        }
        if (isset($this->inputPost()["cancel"])) {
            header("Location: ?controller=AddressController");
        }
        $this->loadView("header.php");
        $this->loadView("employee/edit_employee_address.php");
        $this->loadView("footer.php");
    }
}