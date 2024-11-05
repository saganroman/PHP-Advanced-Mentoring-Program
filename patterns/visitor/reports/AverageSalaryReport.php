<?php

namespace visitor\reports;

use visitor\contracts\CompanyReportVisitor;
use visitor\entities\Company;

require_once __DIR__ . '/../contracts/CompanyReportVisitor.php';

class AverageSalaryReport implements CompanyReportVisitor
{
    private float $averageSalary = 0.0;

    public function visitCompany(Company $company): void
    {
        $totalSalary = 0;
        $employeeCount = count($company->getEmployees());

        foreach ($company->getEmployees() as $employee) {
            $totalSalary += $employee->getSalary();
        }

        $this->averageSalary = $employeeCount > 0 ? $totalSalary / $employeeCount : 0;
        echo "Average Salary: $" . round($this->averageSalary, 2) . PHP_EOL;
    }
}
