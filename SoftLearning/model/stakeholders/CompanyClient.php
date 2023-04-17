<?php

include_once 'Client.php';
include_once 'Company.php';
include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
class CompanyClient extends Client{
    protected Company $company;
    
    public function __construct(string $id, string $name, string $adress, string $phone, string $email, string $birthDate,
            int $clientId, string $commercialreg, string $type, int $employees) {
        parent::__construct($id, $name, $adress, $phone, $email, $birthDate, $clientId);
        /*
         Constructor formado por atributos de Persona y de Client hasta clientId
         el resto son los atributos necesarios para realizar la composicion para la clase
         Company 
         */
        $this->company = new Company($commercialreg, $type, $employees);//composicion
 
    }
    
    public function setType(string $type):int{
        return $this->company->setType($type);
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
