<?php

class Employee extends Person{
    protected float $salary;//Salario
    protected string $position;//Posicion-cargo
    protected string $job;//Trabajo
    protected DataTime $hireDate;//Fecha de antiguedad
    
    public function __construct(string $name, string $email, string $ident, string $phone, string $address, 
            string $birthDay, float $salary, string $position, string $job, string $hireDate) {
        
        parent::__construct($name, $email, $ident, $phone, $address, $birthDay); //constructor de la clase de la que hereda (Person)
        $this->salary = $salary;
        $this->position = $position;
        $this->job = $job;
        $this->hireDate = new DataTime($hireDate);
    }
    
    public function getSalary(): float {
        return $this->salary;
    }

    public function getPosition(): string {
        return $this->position;
    }

    public function getJob(): string {
        return $this->job;
    }

    public function getHireDate(): string {
        return $this->hireDate->format("d-m-y");
    }

    public function setSalary(float $salary): void {
        $this->salary = $salary;
    }

    public function setPosition(string $position): void {
        $this->position = $position;
    }

    public function setJob(string $job): void {
        $this->job = $job;
    }

    public function setHireDate(string $hireDate): void {
        $this->hireDate = new DataTime($hireDate);
    }
}
