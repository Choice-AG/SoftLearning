<?php

include_once 'Client.php';
include_once 'Company.php';
include_once '../checks/checker.php';

class companyClient extends Client {

    protected Company $company;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, int $clientId, string $commercialreg, string $type, int $employees) {
        parent::__construct($name, $ident, $phone, $email, $address, $birthday, $clientId);
        $this->company = new Company($commercialreg, $type, $employees);
        //Hasta $birthday es la herencia de client los de despues son por instancia de company
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

    public function setCommercialreg(string $commercialreg): int {
        $error = Checker::StringValidator($commercialreg, 5);
        if ($error == 0) {
            $this->commercialreg = $commercialreg;
        }
        return $error;
    }

    public function setEmployees(int $employees): int {
        $error = Checker::NumberValidator($employees);
        if ($error == 0) {
            $this->employees = $employees;
        }
        return $error;
    }

}
