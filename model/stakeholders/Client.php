<?php

include_once 'Person.php';
include_once 'Stakeholder.php';
class Client extends Person implements Stakeholder, JsonSerializable{

    protected int $clientId;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, int $clientId) {
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

    public function jsonSerialize() {
        return [
            'name' => $this->getName(),
            'ident' => $this->getIdent(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
            'address' => $this->getAddress(),
            'birthday' => $this->getBirthday(),
            'clientId' => $this->getClientId()
        ];
    }
}
