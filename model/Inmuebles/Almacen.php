<?php

include_once 'Inmueble.php';

class Almacen extends Inmueble
{ //alturaMax, numPisos
  protected float $alturaMax;
  protected int $numPisos;

  //Constructor protegido
  public function __construct(string $id, string $direccion, int $superficie, float $alquilerMensual, string $fechaConstruccion, float $alturaMax, int $numPisos)
  {
    parent::__construct($id, $direccion, $superficie, $alquilerMensual, $fechaConstruccion);

    $message = "";
    $error = $this->setAlturaMax($alturaMax);
    if ($error != 0) {
      $message .= "Bad Altura Maxima;";
    }
    $error = $this->setNumPisos($numPisos);
    if ($error != 0) {
      $message .= "Bad Numero de Pisos";
    }
    if (strlen($message) > 0) {
      throw new BuildException($message);
    }
  }

  //Setters
  public function getAlturaMax(): int
  {
    return $this->alturaMax;
  }
  public function getNumPisos(): float
  {
    return $this->numPisos;
  }

  //Getters protegidos
  public function setAlturaMax(int $alturaMax): int
  {
    $error = Checker::NumberValidator($alturaMax);
    if ($error == 0) {
      $this->alturaMax = $alturaMax;
    }
    return $error;
  }
  public function setNumPisos(float $numPisos): int
  {
    $error = Checker::NumberValidator($numPisos);
    if ($error == 0) {
      $this->numPisos = $numPisos;
    }
    return $error;
  }

  public function getCosteAnual(): float {
    return $this->getAlquilerMensual() * 12;
  }

  public function getAccessDetails(): string {
    return $this->getId() . ";" . $this->getDireccion() . $this->getNumPisos() .";" . $this->getAlturaMax();
  }
}