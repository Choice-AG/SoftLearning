<?php

class Provider extends Person{
    protected string $commercials; //Que tipo de proveedor es
    protected int $delayDay; //Los dias de margen para pagar
    
    public function __construct(string $name, string $email, string $ident, string $phone, string $address, 
            string $birthDay,string $commercials, int $delayDay) {
        
        parent::__construct($name, $email, $ident, $phone, $address, $birthDay);
        
        $this->commercials = $commercials;
        $this->delayDay = $delayDay;
    }
    
    public function getCommercials(): string {
        return $this->commercials;
    }

    public function getDelayDay(): int {
        return $this->delayDay;
    }
    
    public function setCommercials(string $commercials): void {
        $this->commercials = $commercials;
    }

    public function setDelayDay(int $delayDay): void {
        $this->delayDay = $delayDay;
    }
}
