<?php

namespace visitor\reports;

use visitor\contracts\CompanyReportVisitor;
use visitor\entities\Company;

require_once __DIR__ . '/../contracts/CompanyReportVisitor.php';
class TotalNumberOfEmployeesReport implements CompanyReportVisitor {
    private int $employeeCount = 0;

    public function visitCompany(Company $company): void {
        $this->employeeCount = count($company->getEmployees());
        echo "Total Number of Employees: " . $this->employeeCount . PHP_EOL;
    }
}
