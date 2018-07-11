<?php
declare(strict_types=1);

class Worker extends Human{
    private $weeklySalary;
    private $hoursPerDay;
    private $salaryPerHour;

    public function __construct(string $firstName, string $lastName, float $weeklySalary, float $hoursPerDay)
    {
        parent::setFirstName($firstName);
        parent::setLastName($lastName);
        $this->setWeeklySalary($weeklySalary);
        $this->setHoursPerDay($hoursPerDay);
        $this->salaryPerHour = $this->setSalaryPerHour();
    }

    private function setWeeklySalary(float $weeklySalary){
        if($weeklySalary <= 10 ){
            throw new Exception("Expected value mismatch!Argument: " . $weeklySalary);
        }
        $this->weeklySalary = $weeklySalary;
    }

    private function setHoursPerDay(float $hoursPerDay){
        if($hoursPerDay < 1 or $hoursPerDay > 12){
            throw new Exception("Expected value mismatch!Argument: ". $hoursPerDay);
        }
        $this->hoursPerDay = $hoursPerDay;
    }

    private function setSalaryPerHour(): string{
        return number_format($this->weeklySalary / (7 * $this->hoursPerDay),
            2,
            '.',
            '');
    }

    private function getWeeklySalary(){
        return number_format($this->weeklySalary, 2, '.', '');
    }

    private function getHoursPerDay(){
        return number_format($this->hoursPerDay, 2, '.', '');
    }

    protected function setLastName(string $lastName){
        if (strlen($lastName) <= 3){
            throw new Exception("Expected length more than 3 symbols!Argument: ". $lastName);
        }
        parent::setLastName($lastName);
    }

    public function __toString()
    {
        return parent::__toString() .
            "Week Salary: " . $this->getWeeklySalary() . PHP_EOL .
            "Hours per day: " . $this->getHoursPerDay() . PHP_EOL .
            "Salary per hour: " . $this->salaryPerHour . PHP_EOL;
    }
}