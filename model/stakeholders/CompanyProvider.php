<?php

include_once 'Provider.php';
include_once 'Company.php';

class CompanyProvider extends Provider{
    protected Company $company;
    
    public function __construct(string $name, string $email, string $ident, string $phone, string $address, 
            string $birthDay,string $commercials, int $delayDay, string $commercialReg, string $type, int $employees) {
        
        parent::__construct($name, $email, $ident, $phone, $address, $birthDay, $commercials, $delayDay, $commercialReg,
                $type, $employees);
        
        $this->company = new Company($commercialReg, $type, $employees);
    }
    
    public function getCompany() {
        return $this->company;
    }

    public function setCompany(string $company): void {
        $this->company = $company;
    }
}
