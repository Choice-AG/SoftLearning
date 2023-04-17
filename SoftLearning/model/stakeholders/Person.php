<?php

include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
abstract class Person {
    protected string $id;
    protected string $name;
    protected string $address;
    protected string $phone;
    protected string $email;
    protected DateTime $birthDate;
    
    public function __construct(string $id, string $name, string $address, string $phone, 
            string $email, string $birthDate) {
        $message = "";
        $error = $this->setId($id);
        if($error != 0){
            $message .= "Bad Id;";
        }
        $error = $this->setName($name);
        if($error != 0){
            $message .= "Bad Name;";
        }
        $error = $this->setAddress($address);
        if($error != 0){
            $message .= "Bad Address;";
        }
        $error = $this->setPhone($phone);
        if($error != 0){
            $message .= "Bad Phone;";
        }
        $error = $this->setEmail($email);
        if($error != 0){
            $message .= "Bad Email;";
        }
        try{
            $error = $this->setBirthDate($birthDate);
            if($error != 0){
                $message .= "Bad Date;";
            }
        } catch (BuildException $ex) {
            $message .= $ex->getMessage();
        }
        if(strlen($message) > 0){
            throw new BuildException($message);
        }
        
    }
    
    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getBirthDate(): string {
        return $this->birthDate->format(("d-m-y"));
    }

    public function setId(string $id): int {
        $error = Checker::StringValidator($id, 8);
        if($error == 0) $this->id =$id;
        return $error;
    }

    public function setName(string $name):int {
        $error = Checker::StringValidator($name, 5);
        if($error == 0) $this->name =$name;
        return $error;
    }

    public function setAddress(string $address): int {
        $error = Checker::StringValidator($address, 10);
        if($error == 0) $this->address =$address;
        return $error;
    }

    public function setPhone(string $phone): int {
        $error = Checker::StringValidator($phone, 9);
        if($error == 0) $this->phone =$phone;
        return $error;
    }

    public function setEmail(string $email): int {
        $error = Checker::StringValidator($email, 9);
        if($error == 0) $this->email =$email;
        return $error;
    }

    public function setBirthDate(string $birthDate): int {
        $error = Checker::StringValidator($birthDate, 10);
        if($error == 0) {
            try{
                $this->birthDate = new DateTime($birthDate);
            } catch (Exception $ex) {
                throw new Exception("Error al introducir la fecha");
            }
            
        }
        return $error;
        
    }

            
    //public abstract function getContactData():string;

}
