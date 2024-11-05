<?php

namespace visitor\contracts;

use visitor\entities\Company;

require_once __DIR__ . '/../entities/Company.php';

interface CompanyReportVisitor
{
    public function visitCompany(Company $company): void;
}
