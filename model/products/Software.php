<?php

class Software extends Product {

  
  public function __construct(string $id, string $name, string $description, string $price, string $author) {
    parent::__construct($id, $name, $description, $price, $author);

    
  }
}