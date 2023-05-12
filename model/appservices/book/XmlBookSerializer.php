<?php

include_once '../model/appservices/XMLSerializerBase.php';

class XMLBookSerializer extends XMLSerializerBase{
  public function serialize(Libro $b): string{
    $jsonB = json_encode($b);
    $bookObj = json_decode($jsonB);
    return '<?xml version="1.0" encoding="UTF-8"?> <book>' . $this->objectSerialize($bookObj) . '</book>';
  }

  public function unserialize(string $stringXML): libro{
    $book = new simpleXMLElement($stringXML);
    return new Libro($book->id, $book->name, $book->description, $book->price, $book->author, $book->isbn, 
    $book->editorial, (int)$book->pages, $book->language, $book->format, (int)$book->weight, $book->dimensions,
    $book->publicationDate, $book->availableDate, $book->genre);
  }
}
