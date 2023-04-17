<?php

include_once 'Provider.php';
include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
class CompanyProvider extends Provider{
    protected Company $company;
    
    public function __construct(string $id, string $name, string $adress, string $phone, string $email, string $birthDate,
            string $commercials, string $delayDays, string $commercialreg, string $type, int $employees) {
        parent::__construct($id, $name, $adress, $phone, $email, $birthDate, $commercials, $delayDays);
        
        $this->company = new Company($commercialreg, $type, $employees);
    }
    
    public function setType(string $type):void{
        $this->company->setType($type);
    }
    
    public function getType():string{
        return $this->company->getType();
    }
    public function setCommercialreg(string $reg): int{
        return $this->company->setCommercialreg($reg);
    }
    public function getCommercialreg(): string{
        return $this->company->getCommercialreg();
    }
    public function setEmployees(int $e): int{
        return $this->company->setEmployees($e);
    }
    public function getEmployees(): int{
        return $this->company->getEmployees();
    }

}
