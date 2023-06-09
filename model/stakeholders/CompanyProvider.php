<?php

include_once 'Provider.php';
include_once 'Company.php';
include_once '../checks/checker.php';

class CompanyProvider extends Provider implements Stakeholder {

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

    public function setType(string $type): int {
        return $this->company->setType($type);
    }

    public function setCommercialreg(string $commercialreg): int {
        return $this->company->setCommercialreg($commercialreg);
    }

    public function setEmployees(int $employees): int {
        return $this->company->setEmployees($employees);
    }
    
    public function getContactData(): string {
        return $this->getEmail() . ";" . $this->getPhone() . ";" . $this->getAddress();
    }

}
