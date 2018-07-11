<?php
class MyController extends Controller
{
    public $inputOne = [];
    public function main()
    {
        include "view/header.php";
        include "view/main.php";
        switch($this->input){
            case 'sales':
                $this->viewSales();
                break;
            case 'addSale':
                $this->viewAddSale();
                break;
            case 'customers':
                $this->viewCustomers();
                break;
            case 'cars':
                $this->viewCars();
                break;
            case 'search':
                $this->searchCarOwner();
                break;
            case 'update_type':
                $this->updateType();
                break;
            case 'update':
                $this->update();
                break;
            default:
                    $this->viewPageNotFound();
                break;
        }
        include "view/footer.php";
    }
    // Todo - change main() according to problem

    public function viewSales()
    {
        $s = new SalesModel($this->db);
        $sales = $s->readAll();
        $sales_total = $s->readTotal();
        include "view/read_sales.php";
    }

    // Todo - problem 1
    // Implement addSale()
    /*public function addSale()
    {
        $s = new SalesModel($this->db);
        $sale = $s->create();
        include "view/add_sale.php";
    }*/
    private function viewAddSale()
    {
        include "view/add_sale.php";
        if (isset($_GET["addSale"])) {
            $hasInput = strlen(trim($_GET["make"])) > 0 && strlen(trim($_GET["model"])) > 0 &&
                strlen(trim($_GET["year"])) > 0 && strlen(trim($_GET["first_name"])) > 0 &&
                strlen(trim($_GET["last_name"])) > 0 && strlen(trim($_GET["amount"])) > 0;
            if ($hasInput) {
                list($currency, $price) = explode(' ', trim($_GET["amount"]));
                $this->inputOne = array(
                    trim($_GET["make"]),
                    trim($_GET["model"]),
                    trim($_GET["year"]),
                    trim($_GET["first_name"]),
                    trim($_GET["last_name"]),
                    trim($currency),
                    trim($price)
                );
                $this->addSale();
            }
        }
    }
    public function addSale()
    {
        try {
            // Insert into cars
            $car = new CarsModel($this->db, $this->inputOne[0], $this->inputOne[1], intval($this->inputOne[2]));
            $car_id = $car->create();
            // Insert into customer
            $customer = new CustomersModel($this->db, $this->inputOne[3], $this->inputOne[4]);
            $customer_id = $customer->create();
            //Insert into sale
            $sale = new SalesModel($this->db,
                intval($car_id), intval($customer_id),
                floatval($this->inputOne[6]), $this->inputOne[5]);
            $sale_id = $sale->create();
            // Output
            $this->viewLastAddSale(intval($sale_id));
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }

    private function viewLastAddSale(int $sale_id)
    {
        $s = new SalesModel($this->db);
        $dt = $s->readLastIdDateTime($sale_id);
        include "view/read_last_dt_sale.php";
    }
    // Todo - problem 2
    private function viewCustomers()
    {
        $c = new CustomersModel($this->db);
        $customers = $c->readCustomers();
        include "view/customers_table.php";
    }

    private function viewPageNotFound()
    {
        include "view/page_not_found.php";
    }

    // Todo - Problem 6
    private function searchCarOwner()
    {
        // Implement searchCarOwner()
        include "view/search_car_owner.php";
        if (isset($_GET["search"]) && strlen(trim($_GET["make"])) > 0) {
            $c = new CarsModel($this->db);
            $carAndOwner = $c->getCarOwner(trim($_GET["make"]));
            if (count($carAndOwner) > 0) {
                include "view/read_car_owner.php";
            } else {
                include "view/read_empty_car_owner.php";
            }
        }
    }

    // Todo - problem 3
    private function viewCars()
    {
        $c = new CarsModel($this->db);
        $cars = $c->readCars();
        include "view/read_cars.php";
    }

    //Todo - Problem 8
    private function updateType()
    {
        include "view/update_type.php";
        if (isset($_GET["update_type"]) && strtolower(trim($_GET["type"])) == "car") {
            include "view/update_car.php";
        } elseif (isset($_GET["update_type"]) && strtolower(trim($_GET["type"])) == "customer") {
            include "view/update_customer.php";
        } elseif (isset($_GET["update_type"]) && strtolower(trim($_GET["type"])) == "sale") {
            include "view/update_sale.php";
        }
    }
    private function update()
    {
        $isUpdate = false;
        $type = null;
        $id = null;
        if (isset($_GET["update"]) && array_key_exists("car_id", $_GET) &&
            strlen(trim($_GET["car_id"])) > 0 && strlen(trim($_GET["make"])) > 0 &&
            strlen(trim($_GET["model"])) > 0 && strlen(trim($_GET["year"])) > 0){
            $id = intval(trim($_GET["car_id"]));
            $c = new CarsModel($this->db, trim($_GET["make"]), trim($_GET["model"]), intval(trim($_GET["year"])));
            $isUpdate = $c->update($id);
            $type = "Car";
            include "view/read_update.php";
        } elseif (isset($_GET["update"]) && array_key_exists("customer_id", $_GET) &&
            strlen(trim($_GET["customer_id"])) > 0 && strlen(trim($_GET["first_name"])) > 0 &&
            strlen(trim($_GET["last_name"])) > 0) {
            $id = intval(trim($_GET["customer_id"]));
            $cs = new CustomersModel($this->db, trim($_GET["first_name"]), trim($_GET["last_name"]));
            $isUpdate = $cs->update($id);
            $type = "Customer";
            include "view/read_update.php";
        } elseif (isset($_GET["update"]) && array_key_exists("sale_id", $_GET) &&
            strlen(trim($_GET["sale_id"])) > 0 && strlen(trim($_GET["date_time_sale"])) > 0 &&
            strlen(trim($_GET["amount"])) > 0) {
            $id = intval(trim($_GET["sale_id"]));
            $s = null;
            if (strlen(trim($_GET["currency"])) > 0) {
                $s = new SalesModel($this->db, null, null,
                    floatval($_GET["amount"]), trim($_GET["currency"]), trim($_GET["date_time_sale"]));
            } else {
                $s = new SalesModel($this->db, null, null,
                    floatval($_GET["amount"]), null, trim($_GET["date_time_sale"]));
            }
            $isUpdate = $s->update($id);
            $type = "Sale";
            include "view/read_update.php";
        }
    }


    // Todo - problem 2


    // Todo - problem 3
    // Implement viewCars()

    // Todo - Problem 6
    // Implement searchCarOwner()
}
