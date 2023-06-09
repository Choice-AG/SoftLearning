<?php

include_once 'Client.php';
include_once 'Company.php';
include_once 'CompanyClient.php';
include_once 'CompanyProvider.php';
include_once 'Employee.php';
include_once 'Provider.php';
include_once 'Person.php';

//Provider
$provider = new Provider("Hugo", "02-88887623", "922222222", "hugo_g@gmail.com", "Passeig de la Marina, 5", "07-02-1992", "Comerciales", 2);
print "Provider<br>ID: " . $provider->getIdent() . "<br>Nombre: " . $provider->getName() . "<br>Dias de retraso: " . $provider->getDelayDays();

//CompanyClient
$cc = new CompanyClient("CEFP Nuria", "08-11547", "936622113", "nuria@escolesnuria.cat", "Apel·les Mestres 52",
        "01-09-1933", 1000, "reg mercant", "SL", 45);
$cc->SetType("S.A."); //Modifico el tipo de SL a SA

print "<br><br>CompanyClient<br>" . $cc->getName() . " " . $cc->getType();
print "<br>Fecha de creación: " . $cc->getBirthday();

//Client
$client = new Client("Cliente", "005", "87889789789", "mail@cliente.com", "Calle de la albondiga", "12-02-1983", 2);
print "<br><br>Client<br>ID:" . $client->getClientId() . "<br>Nombre: " . $client->getName() . 
    "<br>Fecha de nacimiento: " . $client->getBirthday();

    print "<br><br>";
    $client->setName("aaaaaaa");
    print $client->getName();

//Company
$company = new Company("Reg. mercantil", "SL", 100);
print "<br><br>Company<br>Commercial Register: " . $company->getCommercialReg() . "<br>Type: " . 
        $company->getType() . "<br>Employees: " . $company->getEmployees();

//CompanyProvider
$cprovider = new CompanyProvider("Alfonso", "006", "999999999", "alfon.so@proveedor.com", "Avenida de la alfombrilla 5",
    "09-12-1993", "9083940248092", 1, "Comercio Mercantil", "SA", 150);
print "<br><br>CompanyProvider<br>ID:" . $cprovider->getIdent();


//Employee
try {
    $e = new Employee("Goi", "08-8888121223", "9312111113", "goizane@escolesnria.cat", "Apel·les Mestres 52", "01-03-1981", 30000,
            "senior", "programmer", "01-04-2005");

    $error = $e->SetName("Goizane");
    if ($error == 0) {
        print "<br><br>Empleado de Pruebas: " . $e->getName() . "<br><br>";
    } else {
        print Checker::ExplainStringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}

try{
    //$prov = new Provider("283764675", "Provider1sss", "Dir1", "836467777", "email1@gmail.com", "02-02-1999", "hdgfgf", "04-04-2023");
    $employee2 = new Employee("53319646B", "ny", "Dcion1", "726354633", "email1@gmail.com", "02-01-2000", 2000, "senior", "backend", "05-05-2020");
    //echo "Empleado prueba2:". $employee2->getName();
    //$comp = new Company("75554", "hucshhsvcfv", -1);
} catch (BuildException $ex) {
    echo "Mensaje de error de employee2: <br>" . $ex->getMessage() . "<br><br>";
}

function getDataSH(Stakeholder $sh):string {
    return "Name:" . $sh->getName() . ";Id:" . $sh->getIdent() . ";Contact:" . $sh->getContactData();
}

try{
    $client2 = new Client("Goizane", "002", "999999999", "goizane@gmail.com", "Avenida de guipuzcoa", "02-06-2000", "202");
} catch (BuildException $ex) {
    echo $ex->getMessage();
}

try{
    $companyProvider2 = new CompanyProvider("Alejandro", "008", "999999999", "a.lejandro@gmail.com", "Avenida de cadaqués 33", "09-06-1976", "5657565756567", 2, "Registro mercantil", "SA", 200);
    echo "Commercials CompanyProvider: <br>" . $companyProvider2->getCommercials() . "<br><br>";
} catch (BuildException $ex) {
    echo $ex->getMessage();
}

try{
    $provider2 = new Provider("Daniel", "007", "888777666", "daniel.a@provider.com", "Villanueva de la calva", "22-02-1998", "8877998879", 2);
} catch (BuildException $ex) {
    echo $ex->getMessage();
}

print "Cliente2: <br>" . getDataSH($client2);
print "<br>";
print "<br>CompanyProvider2: <br>" . getDataSH($companyProvider2);
print "<br>";
print "<br>Provider2: <br>" . getDataSH($provider2);