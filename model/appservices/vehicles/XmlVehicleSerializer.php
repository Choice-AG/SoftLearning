<?php

class XMLVehicleSerializer extends XMLSerializerBase{
  public function serialize(Vehicle $v): string{
    $jsonVehicle = json_encode($v);
    $vehicleObj = json_decode($jsonVehicle);
    return '<?xml version="1.0" encoding="UTF-8"?> <vehicle>' . $this->objectSerialize($vehicleObj) . '</vehicle>';
  }

  public function unserialize(string $stringXML): Vehicle{
    $vehicle = new simpleXMLElement($stringXML);
    return new Vehicle($vehicle->matricula, $vehicle->marca, $vehicle->model, 
    $vehicle->fechaMatricula, (int)$vehicle->potencia, $vehicle->color);
  }
}