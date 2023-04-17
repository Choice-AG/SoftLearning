<?php

include_once '../model/stakeholders/CompanyClient.php';
include_once '../model/stakeholders/Company.php';
include_once '../model/stakeholders/Provider.php';
include_once '../model/stakeholders/Employee.php';
include_once '../model/stakeholders/CompanyProvider.php';
include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
$cc = new CompanyClient("08-11547", "CEFP Nuria", "Apel·les Mestrs 52", "936622113", "nuria@escolesnuria.cat", '01-09-1933'
        , 1000, "reg mercant", "SL", 20);

echo $cc->getName();

$cc->setType("SA");

echo " : ".$cc->getType()."<br>";

echo $cc->getBirthDate();
echo "<br>";


//$p = new Provider("63546", "Provider1", "Direccion1", "837465873", "email1#gmail.com", "10-09-2011", "commercial", '10-09-2023');

//echo $p->getAddress();

echo "<br>";

//$e = new Employee("736487", "Name1", "DireccionEmployee", "4846757", "email@gmail.com", "01/01/200", 2000, "boss", "developer", "10-09-2011");

//echo $e->getSalary();
echo "<br>";

/*$cp = new CompanyProvider("837475", "CP1", "direccion1", "7365845", "hdgd@gmail.com", "01-01-1999", "commercials", 
        "02-02-2", "837456748", "SA", 200);

$cp->setType("VER");
echo $cp->getType();
*/
echo "<br><br>";

$comp = new Company("237373647464", "prueba", 200);
if($comp->setCommercialreg("1234") == 0){
    echo "El registro comercial es: ".$comp->getCommercialreg()."<br>";
}
else {
    switch($comp->setCommercialreg("1234")){
        case -1:
            echo "Nulo";
            break;
        case -2: 
            echo 'Vacío';
            break;
        case -3:
            echo "Es demasiado corto";
        break;
    }
}
/*
$employee = new Employee("9384", "Nombre1", "Direccion1", "726354633", "email1@gmail.com", "01-01-2000", 2000, "senior", "backend", "05-05-2020");

$error = $employee->setJob("frontend");

if($error == 0){
    echo "El trabajo del empleado es: ".$employee->getJob()."<br>";
}
else {
    switch($error){
        case -1:
            echo "Nulo";
            break;
        case -2: 
            echo 'Vacío';
            break;
        case -3:
            echo "Es demasiado corto";
        break;
    }
}

 */
echo "<br><br>";


print "PERSONA<br><br>";

try{
    
} catch (BuildException $ex) {

}

function getDataSH(Stakeholder $sh):string{
    return "Name:".$sh->getName().";Id:".$sh->getId().";Contact".$sh->getContactData();
 
}

print getDataSH($c);
print "<br><br>";
print getDataSH($cp);





