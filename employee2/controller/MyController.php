<?php
declare(strict_types=1);
class MyController extends Controller
{
    public function main()
    {
        include "view/header.php";
        include "view/main.php";
        switch ($this->action) {
            case 'view':
                $this->view();
                break;
            case 'viewAddresses':
                $this->view();
                break;
            case 'addProject':
                $this->view();
                break;
            case 'viewProjects':
                $this->view();
                break;
            case 'editAddress':
                $this->view();
                break;
            default:
                //$this->viewPageNotFound();
                break;
        }
        include "view/footer.php";
    }
    private function view()
    {
        $route_error = false;
        if (!empty($this->inputGet()["controller"])) {
            if (preg_match("/^[A-Za-z]+$/", $this->inputGet()["controller"])) {
                $controller = $this->inputGet()["controller"];
            } else {
                $route_error = true;
            }
        } else {
            $controller = "MainController";
        }
        if (!empty($_GET["action"])) {
            if (preg_match("/^[A-Za-z]+$/", $this->inputGet()["action"])) {
                $action = $this->inputGet()["action"];
            } else {
                $route_error = true;
            }
        } else {
            $action = "main";
        }
        try {
            if ($route_error === false) {
                $c = new $controller($this->db);
                $c->$action();
            }
        } catch (Exception $e) {
            $this->viewPageNotFound();
        }
    }
    private function viewPageNotFound()
    {
        include "view/page_not_found.php";
    }
}