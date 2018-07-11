<?php
declare(strict_types=1);
namespace CourseIntroduction\MySQL_and_PHP_Fundamentals;

use MongoDB\Driver\Query;

class Employee
{
    private $firstName;
    private $middleName;
    private $lastName;
    private $department;
    private $position;
    private $passport_id;

    /**
     * Employee constructor.
     * @param $firstName
     * @param $middleName
     * @param $lastName
     * @param $department
     * @param $position
     * @param $passport_id
     */
    public function __construct($firstName, $middleName, $lastName, $department= null, $position=null, $passport_id=null)
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->department = $department;
        $this->position = $position;
        $this->passport_id = $passport_id;
    }

    public function insertEmployee($db)
    {
        $query = $db->prepare('INSERT INTO employees (FIRST_NAME, MIDDLE_NAME, LAST_NAME, DEPARTMENT, POSITION, 
                      PASSPORT_ID) VALUES(?, ?, ?, ?, ?, ?)');

        $query->execute(array($this->firstName, $this->middleName, $this->lastName, $this->department, $this->position, $this->passport_id));
    }

    public function exists($db)
    {
        $query = $db->prepare('SELECT * FROM employees WHERE FIRST_NAME = ? AND MIDDLE_NAME = ? AND LAST_NAME = ? AND PASSPORT_ID = ?');

        $query->execute(array($this->firstName, $this->middleName, $this->lastName, $this->passport_id));

        return $query->rowCount() > 0;
    }

    public function createEmail($db, $email_type, $email, $id)
    {
        $query = $db->prepare('INSERT INTO employee_emails (EMPLOYEE_ID, EMAIL, TYPE) VALUES (?, ?, ?)');
        return $query->execute(array($id, $email, $email_type));
    }

    public function getEmployees($db): array
    {
        $query = $db->prepare('SELECT * FROM employees WHERE FIRST_NAME = ? AND MIDDLE_NAME = ? AND LAST_NAME = ?');
        $query->execute(array($this->firstName, $this->middleName, $this->lastName));

        if ($query->rowCount() == 0){
            return [];
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}