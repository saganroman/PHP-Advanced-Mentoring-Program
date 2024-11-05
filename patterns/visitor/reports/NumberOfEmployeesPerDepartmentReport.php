<?php

namespace visitor\reports;

use visitor\contracts\CompanyReportVisitor;
use visitor\entities\Company;

require_once __DIR__ . '/../contracts/CompanyReportVisitor.php';
class NumberOfEmployeesPerDepartmentReport implements CompanyReportVisitor {
    private array $departmentCounts = [];

    public function visitCompany(Company $company): void {
        foreach ($company->getEmployees() as $employee) {
            $department = $employee->getDepartment();
            if (!isset($this->departmentCounts[$department])) {
                $this->departmentCounts[$department] = 0;
            }
            $this->departmentCounts[$department]++;
        }

        echo "Number of Employees per Department:" . PHP_EOL;
        foreach ($this->departmentCounts as $department => $count) {
            echo "$department: $count" . PHP_EOL;
        }
    }
}
