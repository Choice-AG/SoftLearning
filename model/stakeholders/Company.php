<?php

include_once 'Person.php';
include_once '../checks/checker.php';

class Company {

    protected string $commercialreg;
    protected string $type;
    protected int $employees;

    public function __construct(string $commercialreg, string $type, int $employees) {
        $this->commercialreg = $commercialreg;
        $this->type = $type;
        $this->employees = $employees;
    }

    public function getCommercialreg(): string {
        return $this->commercialreg;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getEmployees(): int {
        return $this->employees;
    }

    public function setCommercialreg(string $commercialreg): int {
        $error = Checker::StringValidator($commercialreg, 10);
        if ($error == 0) {
            $this->commercialreg = $commercialreg;
        }
        return $error;
    }

    public function setType(string $type): int {
        $error = Checker::StringValidator($type, 2);
        if ($error == 0) {
            $this->type = $type;
        }
        return $error;
    }

    public function setEmployees(int $employees): int {
        $error = Checker::NumberValidator($employees);
        if ($error == 0) {
            $this->employees = $employees;
        }
        return $error;
    }

}
