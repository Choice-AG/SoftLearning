<?php

include_once 'Provider.php';
include_once 'Company.php';
include_once '../checks/checker.php';

class CompanyProvider extends Provider {

    protected Company $company;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, string $commercials, int $delayDays, string $commercialreg, string $type, int $employees) {
        parent::__construct($name, $ident, $phone, $email, $address, $birthday, $commercials, $delayDays);
        $this->company = new Company($commercialreg, $type, $employees);
    }

    public function getType(): string {
        return $this->company->getType();
    }

    public function getCommercialreg(): string {
        return $this->company->getCommercialreg();
    }

    public function getEmployees(): string {
        return $this->company->getEmployees();
    }

    public function setType(string $type): void {
        $this->company->setType($type);
    }

    public function setCommercialreg(string $commercialreg): void {
        $this->company->setCommercialreg($commercialreg);
    }

    public function setEmployees(int $employees): int {
        $error = Checker::NumberValidator($employees);
        if ($error == 0) {
            $this->employees = $employees;
        }
        return $error;
    }

}
