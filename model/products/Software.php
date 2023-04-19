<?php

include_once 'Product.php';

class Software extends Product {
  protected string $type;
  protected string $version;
  protected string $os;

  //Constructor
  public function __construct(string $id, string $name, string $description, string $price, string $author, string $type, string $version, string $os) {
    parent::__construct($id, $name, $description, $price, $author);

    $message = "";
    $error = $this->setType($type);
    if ($error != 0) {
      $message .= "Bad Type;";
    }
    $error = $this->setVersion($version);
    if ($error != 0) {
      $message .= "Bad Version;";
    }
    $error = $this->setOs($os);
    if ($error != 0) {
      $message .= "Bad Os;";
    }
    if (strlen($message) > 0) {
      throw new BuildException($message);
    }
  }

  //Getters
  public function getType(): string {
    return $this->type;
  }

  public function getVersion(): string {
    return $this->version;
  }

  public function getOs(): string {
    return $this->os;
  }

  //Setters (Protegidos)
  protected function setType(string $type): int {
    $error = Checker::StringValidator($type, 5);
    if ($error == 0) {
      $this->type = $type;
    }
    return $error;
  }

  protected function setVersion(string $version): int {
    $error = Checker::StringValidator($version, 5);
    if ($error == 0) {
      $this->version = $version;
    }
    return $error;
  }

  protected function setOs(string $os): int {
    $error = Checker::StringValidator($os, 5);
    if ($error == 0) {
      $this->os = $os;
    }
    return $error;
  }

  public function getDetails(): string {
    return "Type: " . $this->getType() . " Version: " . $this->getVersion() . " Os: " . $this->getOs();
  }
}