<?php

class JsonVehicleSerializer {

  public static function serialize(Vehicle $v): string {
    return json_encode($v);
  }

  public static function unserialize(string $data): Vehicle {
    $vehicle = json_decode($data);

    return new Vehicle($vehicle->matricula, $vehicle->marca, $vehicle->model, 
      $vehicle->fechaMatricula, $vehicle->potencia, $vehicle->color);
  }
}