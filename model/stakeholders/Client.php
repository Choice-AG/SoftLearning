<?php

include_once 'Person.php';
include_once '../checks/checker.php';

class Client extends Person {

    protected int $clientId;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, int $clientId) {
        $this->clientId = $clientId;
        parent::__construct($name, $ident, $phone, $email, $address, $birthday);
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

}
