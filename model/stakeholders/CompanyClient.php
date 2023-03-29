<?php

include_once 'Client.php';
include_once 'Company.php';

class CompanyClient extends Client {
    protected Company $company;

    //hasta clientid es todo parte de erencia pero como tambien es una empresa hay que instanciar el new company
    public function __construct(string $name, string $email, string $ident, string $phone, string $address, string $birthDay,
            int $ClientId, string $commercialReg, string $type, int $employees) {

        //Primero los de person y luego los de Company.
        parent::__construct($name, $email, $ident, $phone, $address, $birthDay, $ClientId);
        
        //Objeto de clase Company, por eso se le pasan estos 3 campos
        $this->company = new Company($commercialReg, $type, $employees);
    }

    public function setType(string $type): void {
        $this->company->setType($type);
    }

    public function getType() {
        return $this->company->getType();
    }
}
