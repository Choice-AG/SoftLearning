<?php

class JsonBookSerializer {

  public static function serialize(Libro $book): string {
    return json_encode($book);
  }

  public static function arraySerialize(array $book): string {
    return json_encode($book);
  }

  public static function unserialize(string $stringJson): Libro {
    $book = json_decode($stringJson);
    return new Libro($book->id, $book->name, $book->description, $book->price, $book->author, $book->isbn, 
      $book->editorial, $book->pages, $book->language, $book->format, $book->weight, $book->dimensions,
      $book->publicationDate, $book->availableDate, $book->genre);
  }
}

/*
  'name' => $this->getNombre(),
  'autor' => $this->getAutor(),
  'isbn' => $this->getIsbn(),
  'ident' => $this->getId(),
  'precio' => $this->getPrecio(),
  'garantia' => $this->getGarantia(),       
  'details' => $this->getDetails() 
*/