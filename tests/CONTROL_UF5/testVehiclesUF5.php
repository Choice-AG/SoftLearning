<?php
include_once '../../model/checks/checker.php';
include_once '../../exceptions/errorcodes/ErrorExplain.php';
include_once '../../exceptions/BuildException.php';
include_once '../../model/vehicles/Vehicle.php';


//VEHICULO QUE FUNCIONA
try {
  $vehiculo = new Vehicle("6666FFF", "Audi", "R5", "20-06-2018", 300, "Blanco");
  $error = $vehiculo->setColor("Negro");
  if ($error == 0) {
    print "VEHICULO :<br>Matricula: " . $vehiculo->getMatricula() . "<br>Marca: " . $vehiculo->getMarca() .
      "<br>Modelo: " . $vehiculo->getModel() . "<br>Fecha Matricula: " . $vehiculo->getFechaMatricula() .
      "<br>Potencia: " . $vehiculo->getPotencia() . "<br>Color : " . $vehiculo->getColor() . "<br><br>";

    print "ANTIGÜEDAD: <br>" . $vehiculo->getAntiguedad() . " años<br><br>";

    print "REVISIONES:<br>";
    $revision = $vehiculo->getRevision();
    print "Las 5 primeras revisiones han sido:<br>";
    foreach ($revision as $date) {
      print $date . "<br>";
    }

  } else {
    print ErrorExplain::StringErrorCode($error);
  }
} catch (Exception $ex) {
  print $ex->getMessage();
}

//VEHICULO CAMBIANDO EL COLOR A UN STRING MUY CORTO
print "<br><br>VEHICULOS QUE NO FUNCIONAN";
try {
  $vehiculo1 = new Vehicle("6666FFF", "Audi", "R5", "20-06-2018", 300, "Blanco");
  $error = $vehiculo1->setColor("a");
  if ($error == 0) {
    print "VEHICULO :<br>Matricula: " . $vehiculo1->getMatricula() . "<br>Marca: " . $vehiculo1->getMarca() .
      "<br>Modelo: " . $vehiculo1->getModel() . "<br>Fecha Matricula: " . $vehiculo1->getFechaMatricula() .
      "<br>Potencia: " . $vehiculo1->getPotencia() . "<br>Color : " . $vehiculo1->getColor() . "<br><br>";

  } else {
    print "<br>Error de explicación vehiculo1: <br>";
    print ErrorExplain::StringErrorCode($error);
  }
} catch (Exception $ex) {
  print $ex->getMessage();
}

//VEHICULO QUE DEVUELVE BAD MATRICULA Y BAD POTENCIA
print "Vehiculo con bad matricula y potencia:<br> ";
try {
  $vehiculo2 = new Vehicle("666FF", "Audi", "R5", "20-06-2018", 0, "Blanco");
  print "VEHICULO :<br>Matricula: " . $vehiculo2->getMatricula() . "<br>Marca: " . $vehiculo2->getMarca() .
    "<br>Modelo: " . $vehiculo2->getModel() . "<br>Fecha Matricula: " . $vehiculo1->getFechaMatricula() .
    "<br>Potencia: " . $vehiculo2->getPotencia() . "<br>Color : " . $vehiculo2->getColor() . "<br><br>";
} catch (Exception $ex) {
  print $ex->getMessage();
}