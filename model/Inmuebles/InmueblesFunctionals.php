<?php

include_once 'Inmueble.php';
include_once 'Almacen.php';
include_once 'LocalComercial.php';
include_once '../../exceptions/BuildException.php';

/* ------------------------------------PRUEBAS CON ALMACEN------------------------------------ */
//Crear Almacen
$almacen = new Almacen("001", "Avenida de Gava 7", 100, 755.60, "02-06-2000", 70.5, 2);

//Comprobar que se ha creado correctamente
echo "Almacen: <br>" . $almacen->getId() . ";" . $almacen->getDireccion() . ";" . $almacen->getSuperficie() . ";" . $almacen->getAlquilerMensual() .
  $almacen->getFechaConstruccion() . ";" . $almacen->getAlturaMax() . ";" . $almacen->getNumPisos();

//Cambio su numero de pisos
$almacen->setNumPisos(4);

//Comprobar que funciona el cambio
echo "<br><br>Almacen con numPiso cambiado: <br>" . $almacen->getId() . ";" . $almacen->getDireccion() . ";" . $almacen->getSuperficie() . ";" . $almacen->getAlquilerMensual() .
  $almacen->getFechaConstruccion() . ";" . $almacen->getAlturaMax() . ";" . $almacen->getNumPisos();

//Comprobar que no se puede crear un almacen con una direccion y date incorrecto
try {
  $almacen2 = new Almacen("001", "", 2671 , 755.60, "", 70.5, 2);
} catch (BuildException $ex) {
  echo "<br><br>Mensaje de error de almacen2: <br>" . $ex->getMessage() . "<br><br>";
}


/* ------------------------------------PRUEBAS CON LOCAL COMERCIAL------------------------------------ */
//Crear LocalComercial
$localComercial = new LocalComercial("004", "Avenida de Castelldefels 2", 65, 450.50, "12-04-2023", "si", 4570.90);

//Comprobar que se ha creado correctamente
echo "LocalComercial: <br>" . $localComercial->getId() . ";" . $localComercial->getDireccion() . ";" . $localComercial->getSuperficie() . ";" . $localComercial->getAlquilerMensual() .
  $localComercial->getFechaConstruccion() . ";" . $localComercial->getFacilidadAparcar() . ";" . $localComercial->getImporteMensual();

//Cambio la facilidad de aparcar
$localComercial->setFacilidadAparcar("no");

//Comprobar que funciona el cambio
echo "<br><br>LocalComercial con facilidad de aparcar cambiado: <br>" . $localComercial->getId() . ";" . $localComercial->getDireccion() . ";" . $localComercial->getSuperficie() . ";" . $localComercial->getAlquilerMensual() .
$localComercial->getFechaConstruccion() . ";" . $localComercial->getFacilidadAparcar() . ";" . $localComercial->getImporteMensual();

//Comprobar que no se puede crear un almacen con la facilidad de aparcar y el importe mensual mal
try {
  $localComercial2 = new LocalComercial("004", "Avenida de Castelldefels 2", 65, 450.50, "12-04-2023", "", 0);
} catch (BuildException $ex) {
  echo "<br><br>Mensaje de error de localComercial2: <br>" . $ex->getMessage();
}



/* ------------------------------------PROBAR LA INTERFACE------------------------------------ */
function getDataAlquilable(Alquilable $alquilable): string
{
  return "Id:" . $alquilable->getId() . ";CosteAnual:" . $alquilable->getCosteAnual() . ";AccessDetails:" . $alquilable->getAccessDetails();
}

print "<br><br>Datos de Almacen con la interface:<br>" . getDataAlquilable($almacen);
print "<br><br>Datos de LocalComercial con la iterface:<br>" . getDataAlquilable($localComercial);