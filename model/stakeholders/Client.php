<?php

include_once 'Person.php';
include_once '../checks/checker.php';
include_once '../../exceptions/BuildException.php';
include_once 'Stakeholder.php';

class Client extends Person implements Stakeholder{

    protected int $clientId;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, int $clientId) {
        $this->clientId = $clientId;
        parent::__construct($name, $ident, $phone, $email, $address, $birthday);
        $message = "";
        $error = $this->setClientId($clientId);
        if ($error != 0) {
            $message .= "Bad ClientId";
        }
        if (strlen($message) > 0) {
            throw new BuildException($message);
        }
    }

    public function getClientId(): int {
        return $this->clientId;
    }

    public function setClientId(int $clientId): int {
        $error = Checker::NumberValidator($clientId);
        if ($error == 0) {
            $this->clientId = $clientId;
        }
        return $error;
    }
    
    public function getContactData(): string {
        return $this->getEmail() . ";" . $this->getPhone();
    }

}
