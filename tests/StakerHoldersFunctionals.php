<?php
    include_once '../model/stackholder/CompanyClient.php';
    include_once '../model/stackholder/CompanyProvider.php';
    include_once '../model/stackholder/Client.php';
    include_once '../model/stackholder/Company.php';
    include_once '../model/stackholder/Employee.php';
    include_once '../model/stackholder/Provider.php';
    include_once '../model/checks/checker.php';
    $date = new DateTime("01-09-1993");
    $cc = new companyClient("CEFP Nuria", "08-11547", "12345678", "nuria@gmmercail.com", "Apel·les Mestres 52","01-09-1993", 1000, "reg mercant", "SL", 20);
    $cp = new CompanyProvider("David Prov", "1254", "12345678", "david@gmail.com", "Apel·les Mestres 52", "01-09-1993", "comercial", 11, "reg mercant", "SL", 20);
    $cli = new Client("David Cli", "564534", "511245785", "david@gmail.com", "casa, 24", "08-09-2004", "1");
    $prov = new provider("David Prov", "1535", "12334567", "david@gmail.com", "casa, 24", "08-09-2004", "comercial", 11);
    $empl = new Employee("David Empl", "1535", "54458452", "david@gmail.com", "casa, 24", "08-09-2004", 30000, "Jefe", "job", "29-03-2023");
    try {
        $empl1 = new Employee("David", "1535", "514458452", "davld@gmail.com", "casa, 24", "08-26-2004", 30000, "Jefe", "job", "29-03-2023");
    } catch (Exception $ex) {
        print $ex->getMessage();
    }
    
    print $cc->getName();
    $cc->setType("SA");
    print " : ";
    print $cc->getType()." ";
    print $cc->getBirthday()."<br>";
    print $cli->getName();
    print $cli->getBirthday()."<br>";
    print $prov->getName();
    print $prov->getBirthday()."<br>";
    print $empl->getName();
    print $empl->getBirthday()." ";
    print $empl->getHireDate()."<br>";
    print $cp->getName();
    print $cp->getBirthday()." ";
    print $cp->getAddress()."<br>";
    
