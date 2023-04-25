<?php

include_once '../checks/checker.php';
include_once './interface/Alquilable.php';

abstract class Inmueble implements Alquilable
{ //id, direccion, superficie, alquilerMensual, fechaConstruccion
  protected string $id;
  protected string $direccion;
  protected int $superficie;
  protected float $alquilerMensual;
  protected DateTime $fechaConstruccion;

  //Constructor protegido
  public function __construct(string $id, string $direccion, int $superficie, float $alquilerMensual, string $fechaConstruccion)
  {
    $message = "";

    $error = $this->setId($id);
    if ($error != 0) {
      $message .= "Bad Id;";
    }

    $error = $this->setDireccion($direccion);
    if ($error != 0) {
      $message .= "Bad Direccion;";
    }

    $error = $this->setSuperficie($superficie);
    if ($error != 0) {
      $message .= "Bad Superficie;";
    }

    $error = $this->setAlquilerMensual($alquilerMensual);
    if ($error != 0) {
      $message .= "Bad AlquilerMensual;";
    }

    try {
      $error = $this->setFechaConstruccion($fechaConstruccion);
      if ($error != 0) {
        $message .= "Bad Date;";
      }
    } catch (BuildException $ex) {
      $message .= $ex->getMessage();
    }
    if (strlen($message) > 0) {
      throw new BuildException($message);
    }
  }

  //Setters
  public function getId(): string
  {
    return $this->id;
  }
  public function getDireccion(): string
  {
    return $this->direccion;
  }
  public function getSuperficie(): int
  {
    return $this->superficie;
  }
  public function getAlquilerMensual(): float
  {
    return $this->alquilerMensual;
  }
  public function getFechaConstruccion(): string
  {
    return $this->fechaConstruccion->format("d-m-y");
  }

  //Getters protegidos
  public function setId(string $id): int
  {
    $error = Checker::StringValidator($id, 2);
    if ($error == 0) {
      $this->id = $id;
    }
    return $error;
  }
  public function setDireccion(string $direccion): int
  {
    $error = Checker::StringValidator($direccion, 8);
    if ($error == 0) {
      $this->direccion = $direccion;
    }
    return $error;
  }
  public function setSuperficie(int $superficie): int
  {
    $error = Checker::NumberValidator($superficie);
    if ($error == 0) {
      $this->superficie = $superficie;
    }
    return $error;
  }
  public function setAlquilerMensual(float $alquilerMensual): int
  {
    $error = Checker::NumberValidator($alquilerMensual);
    if ($error == 0) {
      $this->alquilerMensual = $alquilerMensual;
    }
    return $error;
  }
  public function setFechaConstruccion(string $fechaConstruccion): int
  {
    $error = Checker::StringValidator($fechaConstruccion, 10);
    if ($error == 0) {
      try {
        $this->fechaConstruccion = new DateTime($fechaConstruccion);
      } catch (BuildException $ex) {
        throw new BuildException("Error al introducir la fecha");
      }
    }
    return $error;
  }
}