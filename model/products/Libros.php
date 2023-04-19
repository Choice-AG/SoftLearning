<?php

include_once 'Product.php';

class Libro extends Product {
  protected string $isbn;
  protected string $editorial;
  protected int $pages;
  protected string $language;
  protected string $format;
  protected int $weight;
  protected string $dimensions;
  protected DateTime $publicationDate;
  protected string $genre;

  //Constructor
  public function __construct(string $id, string $name, string $description, string $price, string $author, string $isbn, string $editorial, 
    int $pages, string $language, string $format, int $weight, string $dimension, string $publicationDate, string $genre) {
    parent::__construct($id, $name, $description, $price, $author);

    $message = "";
    $error = $this->setIsbn($isbn);
    if ($error != 0) {
      $message .= "Bad Isbn;";
    }
    $error = $this->setEditorial($editorial);
    if ($error != 0) {
      $message .= "Bad Editorial;";
    }
    $error = $this->setPages($pages);
    if ($error != 0) {
      $message .= "Bad Pages;";
    }
    $error = $this->setLanguage($language);
    if ($error != 0) {
      $message .= "Bad Language;";
    }
    $error = $this->setFormat($format);
    if ($error != 0) {
      $message .= "Bad Format;";
    }
    $error = $this->setWeight($weight);
    if ($error != 0) {
      $message .= "Bad Weight;";
    }
    $error = $this->setDimensions($dimension);
    if ($error != 0) {
      $message .= "Bad Dimensions;";
    }
    try {
      $error = $this->setPublicationDate($publicationDate);
      if ($error != 0){
        $message .= "Bad Publication Date;";
      }
    } catch (BuildException $ex) {
        $message .= $ex->getMessage();
    }
    $error = $this->setGenre($genre);
    if ($error != 0) {
      $message .= "Bad Genre;";
    }
    if (strlen($message) > 0) {
      throw new BuildException($message);
    }
  }
  
  //Getters
  public function getIsbn(): string {
    return $this->isbn;
  }
  public function getEditorial(): string {
    return $this->editorial;
  }
  public function getPages(): int {
    return $this->pages;
  }
  public function getLanguage(): string {
    return $this->language;
  }
  public function getFormat(): string {
    return $this->format;
  }
  public function getWeight(): int {
    return $this->weight;
  }
  public function getDimensions(): string {
    return $this->dimensions;
  }
  public function getPublicationDate(): string {
    return $this->publicationDate->format("d-m-y");
  }
  public function getGenre(): string {
    return $this->genre;
  }

  //Setters (Protegidos)
  public function setIsbn($isbn): int {
    $error = Checker::StringValidator($isbn, 10);
    if ($error == 0) {
      $this->isbn = $isbn;
    }
    return $error;
  }
  public function setEditorial($editorial): int {
    $error = Checker::StringValidator($editorial, 5);
    if ($error == 0) {
      $this->editorial = $editorial;
    }
    return $error;
  }
  public function setPages($pages): int {
    $error = Checker::NumberValidator($pages);
    if ($error == 0) {
      $this->pages = $pages;
    }
    return $error;
  }
  public function setLanguage($language): int {
    $error = Checker::StringValidator($language, 5);
    if ($error == 0) {
      $this->language = $language;
    }
    return $error;
  }
  public function setFormat($format): int {
    $error = Checker::StringValidator($format, 5);
    if ($error == 0) {
      $this->format = $format;
    }
    return $error;
  }
  public function setWeight($weight): int {
    $error = Checker::NumberValidator($weight);
    if ($error == 0) {
      $this->weight = $weight;
    }
    return $error;
  }
  public function setDimensions($dimensions): int {
    $error = Checker::StringValidator($dimensions, 4);
    if ($error == 0) {
      $this->dimensions = $dimensions;
    }
    return $error;
  }
  public function setPublicationDate($publicationDate): int {
    $error = Checker::StringValidator($publicationDate, 10);
    if ($error == 0) {
      try {
        $this->publicationDate = new DateTime($publicationDate);
      } catch (Exception $ex) {
          throw new Exception("Error al introducir la fecha");
      }
    }
    return $error;
  }
  public function setGenre($genre): int {
    $error = Checker::StringValidator($genre, 4);
    if ($error == 0) {
      $this->genre = $genre;
    }
    return $error;
  }

  public function getDetails(): string{
    return "ISBN: " . $this->getIsbn() . " Editorial: " . $this->getEditorial() . " Pages: " . $this->getPages() . 
    " Language: " . $this->getLanguage() . " Format: " . $this->getFormat() . " Weight: " . $this->getWeight() . 
    " Dimensions: " . $this->getDimensions() . " PublicationDate: " . $this->getPublicationDate() . " Genre: " . $this->getGenre();
  }
}