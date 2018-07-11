<?php
declare(strict_types=1);
/*spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});*/
include 'db_config.php';
include 'Employee.php';

try {
    // Problem 3. Insert Email
    $input = trim(fgets(STDIN));
    while ($input != "END") {
        $data = explode(', ', $input);
        if (count($data) < 5 || $data[3] != 'emails') {
            throw new Exception ("Error: Invalid input.");
        }
        $employee = new CourseIntroduction\MySQL_and_PHP_Fundamentals\Employee($data[0], $data[1], $data[2]);

        $email_data = explode('emails, ', $input);

        $email_data = $email_data[1];

        $email_data = explode(', ', $email_data);

        foreach ($email_data as $single_email) {
            $email = explode(': ', $single_email);

            $employee_data = $employee->getEmployees($db);

            if (!$employee_data || count($employee_data)> 1){
                $ids = array();

                foreach ($employee_data as $single_employee){
                    $ids[] = $single_employee['id'];
                }
                throw new Exception("Employees with this name: " . implode(', ', $ids));
            }
            if ($employee->createEmail($db, $email[0], $email[1], $employee_data[0]['id'])){
                echo "Emails of " . $employee_data[0]['firstName'] . ' ' . $employee_data[0]['middleName'] . ' ' .
                    $employee_data[0]['lastName'] . ' saved' . PHP_EOL;
            }
        }
        /*$employee = new CourseIntroduction\MySQL_and_PHP_Fundamentals\Employee($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
        if ($employee->exists($db)){
            throw new Exception("Error: This employee already exists");
        }else {
            $employee->insertEmployee($db);
            echo "New employee " . $data[0] . $data[1] . $data[2] ." saved." . PHP_EOL;
        }*/
        $input = trim(fgets(STDIN));
    }
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
/*
 * взимаш входа и го експлоудваш по запетая
 * */
/*
try {
    // Problem 2. HR Application Insert Employee
    $input = trim(fgets(STDIN));
    while ($input != "END") {
        $data = explode(',', $input);
        if (count($data) < 6) {
            throw new Exception ("Error: Please, check your input syntax.");
        }
        $employee = new CourseIntroduction\MySQL_and_PHP_Fundamentals\Employee($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);

        if ($employee->exists($db)){
            throw new Exception("Error: This employee already exists");
        }else {
            $employee->insertEmployee($db);
            echo "New employee " . $data[0] . $data[1] . $data[2] ." saved." . PHP_EOL;
        }
        $input = trim(fgets(STDIN));
    }
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}*/