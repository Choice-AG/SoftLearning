<?php

class Company {
    protected string $commercialReg;//Registro comercial donde estas inscrito
    protected string $type;//Que tipo de sociedad eres: SA...
    protected int $employees;
    
    //Constructor
    public function __construct(string $commercialReg, string $type, int $employees) {
        $this->commercialReg = $commercialReg;
        $this->type = $type;
        $this->employees = $employees;
    }

    //Getters
    public function getCommercialReg(): string {
        return $this->commercialReg;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getEmployes(): int {
        return $this->employees;
    }

    //Setters
    public function setCommercialReg(string $commercialReg): void {
        $this->commercialReg = $commercialReg;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function setEmployes(int $employes): void {
        $this->employees = $employes;
    }
}
