<?php
include_once '../../model/checks/checker.php';
include_once '../../model/vehicles/Vehicle.php';

include_once '../../model/appservices/vehicles/JsonVehicleSerializer.php';
include_once '../../model/appservices/XMLSerializerBase.php';
include_once '../../model/appservices/vehicles/XmlVehicleSerializer.php';

try {
  $vehicle = new Vehicle("6666FFF", "Audi", "R5", "20-06-2018", 300, "Blanco");

  $vehicleSerialized = JsonVehicleSerializer::serialize($vehicle);
  print "VEHICLE SERIALIZED JSON:<br>";
  var_dump($vehicleSerialized);
  print "<br><br>";
  
  $vehicleUnserialized = JsonVehicleSerializer::unserialize($vehicleSerialized);
  print "VEHICLE UNSERIALIZED JSON:<br>";
  var_dump($vehicleUnserialized);
  print "<br><br>";

} catch (Exception $ex) {
  print $ex->getMessage() . "<br><br>";
}

print "<br><br>";

try {
  $vehicle = new Vehicle("6666FFF", "Audi", "R5", "20-06-2018", 300, "Blanco");
  $vehicleXmlSerialized = new XMLVehicleSerializer();
  $stringXML = $vehicleXmlSerialized->serialize($vehicle);
  print "VEHICLE SERIALIZED XML:<br>";
  var_dump($vehicleXmlSerialized);
  print "<br><br>";
  print "VEHICLE UNSERIALIZED XML:<br>";
  var_dump($vehicleXmlSerialized->unserialize($stringXML));

} catch (Exception $ex) {
  print $ex->getMessage() . "<br><br>";
}