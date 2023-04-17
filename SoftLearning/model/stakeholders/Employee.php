<?php

include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';

class Employee extends Person{
    protected float $salary;
    protected string $position;
    protected string $job;
    protected Datetime $hireDate;//fecha contratacion
    
    public function __construct(string $id, string $name, string $adress, string $phone, string $email, string $birthDate, 
            float $salary, string $position, string $job, string $hireDate) {
        parent::__construct($id, $name, $adress, $phone, $email, $birthDate);
        $message = "";
        $error = $this->setSalary($salary);
        if($error != 0){
            $message.= "Bad salary;";
        }
        $error = $this->setPosition($position);
        if($error != 0){
            $message.= "Bad Position;";
        }
        $error = $this->setJob($job);
        if($error != 0){
            $message.= "Bad Job;";
        }
        try{
            $error = $this->setHireDate($hireDate);
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

    public function setSalary(float $salary): float {
        $error = Checker::NumberValidator($salary);
        if($error == 0) $this->salary = $salary;
        return $error;
        
    }

    public function setPosition(string $position): int {
        $error = Checker::StringValidator($position, 5);
        if($error==0) $this->position = $position;
        return $error;
    }

    public function setJob(string $job):int {
        $error = Checker::StringValidator($job, 5);
        if($error==0) $this->job = $job;
        return $error;
        
    }

    public function setHireDate(string $hireDate):int {
        $error = Checker::StringValidator($hireDate, 10);
        if($error == 0) $this->hireDate = new DateTime($hireDate);
        return $error;
        
    }



}
