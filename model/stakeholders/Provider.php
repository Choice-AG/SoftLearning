<?php

include_once 'Person.php';
include_once '../checks/checker.php';

class Provider extends Person {

    protected string $commercials;
    protected int $delayDays;

    public function __construct(string $name, string $ident, string $phone, string $email, string $address, string $birthday, string $commercials, int $delayDays) {
        
        parent::__construct($name, $ident, $phone, $email, $address, $birthday);

        $message = "";
        $error = $this->setCommercials($commercials);
        if ($error != 0) {
            $message .= "Bad Commercials";
        }
        $error = $this->setDelayDays($delayDays);
        if ($error != 0) {
            $message .= "Bad DelayDays";
        }
        if (strlen($message) > 0) {
            throw new BuildException($message);
        }
    }

    public function getCommercials(): string {
        return $this->commercials;
    }

    public function getDelayDays(): int {
        return $this->delayDays;
    }

    public function setCommercials(string $commercials): int {
        $error = Checker::StringValidator($commercials, 5);
        if ($error == 0) {
            $this->commercials = $commercials;
        }
        return $error;
    }

    public function setDelayDays(int $delayDays): int {
        $error = Checker::NumberValidator($delayDays);
        if ($error == 0) {
            $this->delayDays = $delayDays;
        }
        return $error;
    }

}
