<?php

include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
class Provider extends Person implements Stakeholder {
    protected string $commercials;
    protected DateTime $delayDays;
    
    public function __construct(string $id, string $name, string $address, string $phone, string $email, string $birthDate,
            string $commercials, string $delayDays) {
        parent::__construct($id, $name, $address, $phone, $email, $birthDate);
        $message = "";
        $error = $this->setCommercials($commercials);
        if($error != 0){
            $message.="Bad commercial";
        }
        
        try{
            $error = $this->setDelayDays($delayDays);
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
    
    public function getCommercials(): string {
        return $this->commercials;
    }

    public function getDelayDays(): string {
        return $this->delayDays->format("d-m-y");
    }

    public function setCommercials(string $commercials): int {
        $error = Checker::StringValidator($commercials, 5);
        if($error == 0) $this->commercials =$commercials;
        return $error;
    }

    public function setDelayDays(string $delayDays): int {
        $error = Checker::StringValidator($delayDays, 10);
        if($error == 0) $this->delayDays = new DateTime($delayDays);
        return $error;
        
    }
    
    public function getContactData(): string {
        return $this->getEmail() . ";" . $this->getPhone().  ";" . $this->getAddress();
    }


    

}
