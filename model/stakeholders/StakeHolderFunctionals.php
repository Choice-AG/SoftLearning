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
$cc->SetType("SA");

print $cc->getName() . " : " . $cc->getType();
print "<br>Fecha de creación: " . $cc->getBirthday();

//Client
$c = new Client("cliente", "cliente@gmail.com", "001", "678978978", "La empresa de al lado Nº5", "02-03-1978", 1);
