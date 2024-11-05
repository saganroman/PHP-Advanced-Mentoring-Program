<?php
use strategy\entities\Employee;
use strategy\EmployeeCollection;
use strategy\strategies\NameAscending;
use strategy\strategies\SalaryDescending;
use strategy\strategies\DepartmentNameAscending;

require_once __DIR__ . '/entities/Employee.php';
require_once __DIR__ . '/strategies/NameAscending.php';
require_once __DIR__ . '/strategies/NameDescending.php';
require_once __DIR__ . '/strategies/DepartmentNameAscending.php';
require_once __DIR__ . '/strategies/DepartmentNameDescending.php';
require_once __DIR__ . '/strategies/SalaryAscending.php';
require_once __DIR__ . '/strategies/SalaryDescending.php';
require_once __DIR__ . '/EmployeeCollection.php';


// Create some employees
$employee1 = new Employee("Alice", 50000, "Engineering");
$employee2 = new Employee("Bob", 60000, "Marketing");
$employee3 = new Employee("Charlie", 55000, "Engineering");
$employee4 = new Employee("Daisy", 48000, "Sales");

// Create an EmployeeCollection and set the initial sorting strategy
$collection = new EmployeeCollection(new NameAscending());
$collection->addEmployee($employee1);
$collection->addEmployee($employee2);
$collection->addEmployee($employee3);
$collection->addEmployee($employee4);

// Sort by name ascending
echo "Employees sorted by Name (Ascending):" . PHP_EOL;
foreach ($collection->getEmployees() as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . " - $" . $employee->getSalary() . PHP_EOL;
}

// Change to Salary Descending
$collection->setSortingStrategy(new SalaryDescending());

echo "\nEmployees sorted by Salary (Descending):" . PHP_EOL;
foreach ($collection->getEmployees() as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . " - $" . $employee->getSalary() . PHP_EOL;
}

// Change to Department Name Ascending
$collection->setSortingStrategy(new DepartmentNameAscending());

echo "\nEmployees sorted by Department (Ascending):" . PHP_EOL;
foreach ($collection->getEmployees() as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . " - $" . $employee->getSalary() . PHP_EOL;
}
