<?php

abstract class Person { //Abstracta porque cualquier Persona tiene esos campos
    //Atributos
    protected string $name;
    protected string $email;
    protected string $ident;
    protected string $phone;
    protected string $address;
    protected DateTime $birthDay;
    
    //Constructor
    public function __construct(string $name, string $email, string $ident, string $phone, string $address, string $birthDay) {
        $this->name = $name;
        $this->email = $email;
        $this->ident = $ident;
        $this->phone = $phone;
        $this->address = $address;
        $this->birthDay = new DateTime($birthDay);
    }
    
    //Getters
    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getIdent(): string {
        return $this->ident;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getBirthDay(): string {
        return $this->birthDay->format("d-m-y");
    }
    
    //Setters
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setIdent(string $ident): void {
        $this->ident = $ident;
    }

    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    public function setBirthDay(string $birthDay): void {
        $this->birthDay = new DateTime($birthDay);
    } 
}
