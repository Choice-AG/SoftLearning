<?php

include_once 'Product.php';
include_once 'Interface/Storable.php';

class Libro extends Product implements Storable, JsonSerializable{
  protected string $isbn;
  protected string $editorial;
  protected int $pages;
  protected string $language;
  protected string $format;
  protected int $weight;
  protected string $dimensions;
  protected DateTime $publicationDate;
  protected DateTime $availableDate;
  protected string $genre;

  //Constructor
  public function __construct(string $id, string $name, string $description, string $price, string $author, string $isbn, string $editorial, 
    int $pages, string $language, string $format, int $weight, string $dimension, string $publicationDate, string $availableDate, string $genre) {
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
      $this->setPublicationDate($publicationDate);
    } catch (DateException $ex) {
        $message .= $ex->getMessage();
    }
    try {
      $this->setAvailableDate($availableDate);
    } catch (DateException $ex) {
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
    return $this->publicationDate->format("d-m-Y");
  }
  public function getAvailableDate(): string {
    return $this->availableDate->format("d-m-Y");
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
  public function setPublicationDate($publicationDate) {
    $this->publicationDate = Checker::checkDate($publicationDate);
  }
  public function setAvailableDate($availableDate) {
    $this->availableDate = Checker::checkDate($availableDate);
  }
  public function setGenre($genre): int {
    $error = Checker::StringValidator($genre, 4);
    if ($error == 0) {
      $this->genre = $genre;
    }
    return $error;
  }

  public function getDetails(): string {
    return $this->price . "€;" . $this->id . ";" . $this->name . ";" . $this->getIsbn() . ";" . $this->getEditorial() . ";" . $this->getPages() . ";" . $this->getLanguage() . ";" . $this->getFormat() . 
    ";" . $this->getWeight() . ";" . $this->getDimensions() . ";" . $this->getPublicationDate() . ";" . $this->getGenre();
  }

  public function getPeriod(): string {
    $availableDate = $this->availableDate;
    $publicationDate = $this->publicationDate;
    $datesDiff = $publicationDate->diff($availableDate);
    return "Tiempo transcurrido desde que se publico hasta que estuvo disponble: $datesDiff->y años, $datesDiff->m meses y $datesDiff->d días, en total pasaron $datesDiff->days días.";
  }

  public function getInterval(int $days): array {
    $interval = new DateInterval('P' . $days . 'D');
    $inicio = $this->publicationDate;
    $fecha = new DateTime();
    $dateRange = new DatePeriod($inicio, $interval, $fecha);
    $arrayDates = [];
    foreach($dateRange as $date) {
      $arrayDates[] = $date->format('d-m-Y');
    }
    return $arrayDates;
  }

  public function jsonSerialize() {
    return [
      'id' => $this->getId(),
      'name' => $this->getName(),
      'description' => $this->getDescription(),
      'price' => $this->getPrice(),
      'author' => $this->getAuthor(),
      'isbn' => $this->getIsbn(),
      'editorial' => $this->getEditorial(),
      'pages' => $this->getPages(),
      'language' => $this->getLanguage(),
      'format' => $this->getFormat(),
      'weight' => $this->getWeight(),
      'dimensions' => $this->getDimensions(),
      'publicationDate' => $this->getPublicationDate(),
      'availableDate' => $this->getAvailableDate(),
      'genre' => $this->getGenre()
    ];
  }
}

/* 
CREATE TABLE books (
	id SERIAL NOT NULL,
  name VARCHAR(50) NOT NULL,
  description VARCHAR(100) NOT NULL,
  price INT NOT NULL,
  author VARCHAR(50) NOT NULL,    
  isbn VARCHAR(50) UNIQUE NOT NULL,
  editorial VARCHAR(20) NOT NULL,
  pages INT NOT NULL,
  language VARCHAR(20) NOT NULL,
  format VARCHAR(20) NOT NULL,
  weight INT NOT NULL,
  dimensions VARCHAR(20) NOT NULL,
  publication_date DATE NOT NULL,
  available_date DATE NOT NULL,
  genre VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
) 
*/