<?php
include 'Person.php';
class Client extends Person {
    protected int $ClientId;
    
    public function __construct(string $name, string $email, string $ident, 
            string $phone, string $address, string $birthDay, 
            int $ClientId) {
        
        parent::__construct($name, $email, $ident, $phone, $address, $birthDay);
        $this->ClientId = $ClientId;
    }
    
    public function getClientId(): int {
        return $this->ClientId;
    }
    public function setClientId(int $ClientId): void {
        $this->ClientId = $ClientId;
    }
}