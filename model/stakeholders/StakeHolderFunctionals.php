<?php

include_once 'Client.php';
include_once 'Company.php';
include_once 'CompanyClient.php';
include_once 'CompanyProvider.php';
include_once 'Employee.php';
include_once 'Provider.php';

//CompanyClient
$cc = new CompanyClient("CEFP Nuria", "08-11547", "936622113", "nuria@escolesnuria.cat", "Apel·les Mestres 52", 
    "01-09-1933", 1000, "reg mercant", "SL", 45);
$cc->SetType("S.A."); //Modifico el tipo de SL a SA

print "CompanyClient<br>" . $cc->getName() . " " . $cc->getType();
print "<br>Fecha de creación: " . $cc->getBirthday();

//Client
$client = new Client("Cliente", "cliente@gmail.com", "001", "678978978", "La empresa de al lado Nº5", "02-03-1978", 1);
print "<br><br>Client<br>ID:" . $client->getClientId() . "<br>Nombre: " . $client->getName() . "<br>Fecha de nacimiento: " . $client->getBirthday();


//Company
$company = new Company("Reg. mercantil", "SL", 100);
print "<br><br>Company<br>Commercial Register: " . $company->getCommercialReg() . "<br>Type: " . $company->getType() . "<br>Employees: " . $company->getEmployees();

//CompanyProvider
$cprovider = new CompanyProvider("ClienteProveedor", "cproveedor@gmail.com", "001", "934 888 888", "Algun lado", "17-07-1998", "Tizas", 1, "reg mercantil", "SL", 100);
//print "<br><br>CompanyProvider<br>ID:" . $cprovider->getCompany();