<?php

include_once 'Client.php';
include_once 'Company.php';
include_once 'CompanyClient.php';
include_once 'CompanyProvider.php';
include_once 'Employee.php';
include_once 'Provider.php';

$cc = new CompanyClient("CEFP Nuria", "08-11547", "936622113", "nuria@escolesnuria.cat", "Apel·les Mestres 52", 
    "01-09-1933", 1000, "reg mercant", "SL", 45);

$cc->SetType("SA");
print $cc->getName() . " : " . $cc->getType();
print "<br>Fecha de creación: " . $cc->getBirthday();