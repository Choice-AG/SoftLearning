<?php

include_once 'Person.php';
include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
include_once 'Stakeholder.php';

class Client extends Person implements Stakeholder {

    protected int $clientId;

    public function __construct(string $id, string $name, string $adress, string $phone, string $email, string $birthDate,
            int $clientId) {
        parent::__construct($id, $name, $adress, $phone, $email, $birthDate);
        $message = "";
        $error = $this->setClientId($clientId);
        if ($error != 0) {
            $messsage .= "Bad ClientId";
        }
        if (strlen($message) > 0) {
            throw new BuildException($message);
        }
    }

    public function getClientId(): string {
        return $this->clientId;
    }

    public function setClientId(string $clientId): int {
        $error = Checker::StringValidator($clientId, 4);
        if ($error == 0) {
            $this->clientId = $clientId;
        }
        return $error;
    }

    public function getContactData(): string {
        return $this->getEmail() . ";" . $this->getPhone();
    }
}
