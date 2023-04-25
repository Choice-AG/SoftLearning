<?php

include_once 'Inmueble.php';

class LocalComercial extends Inmueble
{ //facilidadAparcar, importeMensual
  protected string $facilidadAparcar;
  protected float $importeMensual;

  //Constructor protegido
  public function __construct(string $id, string $direccion, int $superficie, float $alquilerMensual, string $fechaConstruccion, string $facilidadAparcar, float $importeMensual)
  {
    parent::__construct($id, $direccion, $superficie, $alquilerMensual, $fechaConstruccion);

    $message = "";
    $error = $this->setFacilidadAparcar($facilidadAparcar);
    if ($error != 0) {
      $message .= "Bad FacilidadAparcar;";
    }
    $error = $this->setImporteMensual($importeMensual);
    if ($error != 0) {
      $message .= "Bad ImporteMensual";
    }
    if (strlen($message) > 0) {
      throw new BuildException($message);
    }
  }

  //Setters
  public function getFacilidadAparcar(): string
  {
    return $this->facilidadAparcar;
  }
  public function getImporteMensual(): float
  {
    return $this->importeMensual;
  }

  //Getters protegidos
  public function setFacilidadAparcar(string $facilidadAparcar): int
  {
    $error = Checker::StringValidator($facilidadAparcar, 2);
    if ($error == 0) {
      $this->facilidadAparcar = $facilidadAparcar;
    }
    return $error;
  }
  public function setImporteMensual(float $importeMensual): int
  {
    $error = Checker::NumberValidator($importeMensual);
    if ($error == 0) {
      $this->importeMensual = $importeMensual;
    }
    return $error;
  }

  public function getCosteAnual(): float {
    return $this->getAlquilerMensual() * 12;
  }

  public function getAccessDetails(): string {
    return $this->getId() . ";" . $this->getDireccion() . $this->getFacilidadAparcar() .";" . $this->getImporteMensual();
  }
}