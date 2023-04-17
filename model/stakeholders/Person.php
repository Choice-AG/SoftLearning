<?php

include_once '../checks/checker.php';

abstract class Person {

    protected string $name;
    protected string $ident;
    protected string $phone;
    protected string $email;
    protected string $address;
    protected DateTime $birthday;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday) {
        $message = "";
        $error = $this->setName($name);
        if ($error != 0) {
            $message .= "Bad Name;";
        }
        $error = $this->setIdent($ident);
        if ($error != 0) {
            $message .= "Bad Ident;";
        }
        $error = $this->setPhone($phone);
        if ($error != 0) {
            $message .= "Bad Phone;";
        }
        $error = $this->setEmail($email);
        if ($error != 0) {
            $message .= "Bad Email;";
        }
        $error = $this->setAddress($address);
        if ($error != 0) {
            $message .= "Bad Address;";
        }
        $error = $this->setBirthday($birthday);
        if ($error != 0) {
            $message .= "Bad Date;";
        }
        if ($error == 0) {
            try {
                $this->birthday = new DateTime($birthday);
            } catch (Exception $ex) {
                throw new Exception($message);
            }
        }
    }

    public function getName(): string {
        return $this->name;
    }

    public function getIdent(): string {
        return $this->ident;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getBirthday(): string {
        return $this->birthday->format("d-m-y");
    }

    public function setName(string $name): int {
        $error = Checker::StringValidator($name, 3);
        if ($error == 0) {
            $this->name = $name;
        }
        return $error;
    }

    public function setIdent(string $ident): int {
        $error = Checker::StringValidator($ident, 2);
        if ($error == 0) {
            $this->ident = $ident;
        }
        return $error;
    }

    public function setPhone(string $phone): int {
        $error = Checker::StringValidator($phone, 9);
        if ($error == 0) {
            $this->phone = $phone;
        }
        return $error;
    }

    public function setEmail(string $email): int {
        $error = Checker::StringValidator($email, 5);
        if ($error == 0) {
            $this->email = $email;
        }
        return $error;
    }

    public function setAddress(string $address): int {
        $error = Checker::StringValidator($address, 6);
        if ($error == 0) {
            $this->address = $address;
        }
        return $error;
    }

    public function setBirthday(string $birthday): int {
        $error = Checker::StringValidator($birthday, 10);
        if ($error == 0) {
            try {
                $this->birthday = new DateTime($birthday);
            } catch (Exception $ex) {
                throw new Exception("Error al introducir la fecha");
            }
        }
        return $error;
    }

}
