<?php

namespace visitor\reports;

use visitor\contracts\CompanyReportVisitor;
use visitor\entities\Company;

require_once __DIR__ . '/../contracts/CompanyReportVisitor.php';

class TotalSalaryReport implements CompanyReportVisitor
{
    private int $totalSalary = 0;

    public function visitCompany(Company $company): void
    {
        foreach ($company->getEmployees() as $employee) {
            $this->totalSalary += $employee->getSalary();
        }
        echo "Total Salary: $" . $this->totalSalary . PHP_EOL;
    }
}
