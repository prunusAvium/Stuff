<?php
// Load DB
include "db_config.php";
// Load core classes
include "core/Model.php";
include "core/Controller.php";
// Load model classes - they extend Model.php
include "model/AddressesModel.php";
include "model/EmployeesModel.php";
include "model/ProjectsModel.php";
include "model/EmployeesProjectsModel.php";
include "model/TownModel.php";
// Load Controller class - it extends Controller.php
include "controller/MainController.php";
include "controller/EmployeeController.php";
include "controller/AddressController.php";
include "controller/MyController.php";
$main = new MyController($db);
$main->main();