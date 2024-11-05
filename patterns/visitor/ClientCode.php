<?php
use visitor\entities\Company;
use visitor\entities\Employee;
use visitor\reports\TotalSalaryReport;
use visitor\reports\TotalNumberOfEmployeesReport;
use visitor\reports\AverageSalaryReport;
use visitor\reports\NumberOfEmployeesPerDepartmentReport;

require_once 'entities/Company.php';
require_once 'entities/Employee.php';
require_once 'reports/TotalSalaryReport.php';
require_once 'reports/TotalNumberOfEmployeesReport.php';
require_once 'reports/AverageSalaryReport.php';
require_once 'reports/NumberOfEmployeesPerDepartmentReport.php';
require_once 'contracts/CompanyReportVisitor.php';


$employee1 = new Employee("Alice", 50000, "Engineering");
$employee2 = new Employee("Bob", 60000, "Marketing");
$employee3 = new Employee("Charlie", 55000, "Engineering");
$employee4 = new Employee("Daisy", 48000, "Sales");

// Create a company and add employees
$company = new Company("Tech Corp");
$company->addEmployee($employee1);
$company->addEmployee($employee2);
$company->addEmployee($employee3);
$company->addEmployee($employee4);

// Create different report visitors
$totalSalaryReport = new TotalSalaryReport();
$totalEmployeesReport = new TotalNumberOfEmployeesReport();
$averageSalaryReport = new AverageSalaryReport();
$employeesPerDepartmentReport = new NumberOfEmployeesPerDepartmentReport();

// Generate reports
$company->accept($totalSalaryReport);
$company->accept($totalEmployeesReport);
$company->accept($averageSalaryReport);
$company->accept($employeesPerDepartmentReport);
