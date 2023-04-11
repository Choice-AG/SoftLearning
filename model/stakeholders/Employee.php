<?php

include_once 'Person.php';
include_once '../checks/checker.php';

class Employee extends Person {

    protected float $salary;
    protected string $position;
    protected string $job;
    protected DateTime $hireDate;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, float $salary, string $position, string $job, string $hireDate) {
        $this->setSalary($salary);
        $this->setPosition($position);
        $this->setJob($job);
        $this->setHireDate($hireDate);
        parent::__construct($name, $ident, $phone, $email, $address, $birthday);
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

    public function setSalary(float $salary): int {
        $error = Checker::NumberValidator($salary);
        if ($error == 0) {
            $this->salary = $salary;
        }
        return $error;
    }

    public function setPosition(string $position): int {
        $error = Checker::StringValidator($position, 2);
        if ($error == 0) {
            $this->position = $position;
        }
        return $error;
    }

    public function setJob(string $job): int {
        $error = Checker::StringValidator($job, 2);
        if ($error == 0) {
            $this->job = $job;
        }
        return $error;
    }

    public function setHireDate(string $hireDate): int {
        $error = Checker::StringValidator($hireDate, 10);
        if ($error == 0) {
            $this->hireDate = new DateTime($hireDate);
        }
        return $error;
    }

}
