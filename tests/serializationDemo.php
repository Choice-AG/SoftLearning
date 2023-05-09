<?php

declare(strict_types=1);
include_once '../model/stakeholders/Client.php';
include_once '../model/checks/checker.php';
include_once '../model/appservices/clients/JsonClientSerializer.php';
include_once '../model/products/Libros.php';
include_once '../exceptions/DateException.php';
include_once '../exceptions/BuildException.php';
include_once '../model/appservices/book/JsonBookSerializer.php';

/*
include_once '../exceptions/DateException.php';
include_once '../model/stakeholders/Client.php';

include_once '../model/products/Interface/Storable.php'; */

try {
  $client = new Client("Alvaro Salas", "012", "656656656", "a.salas@gmail.com", "calle mayor", "02-02-2000", 23);

  $clientSerialized = JsonClientSerializer::serialize($client);
  var_dump($clientSerialized);
  print "<br><br>";
  
  $clientUnserialized = JsonClientSerializer::unserialize($clientSerialized);
  var_dump($clientUnserialized);
  print "<br><br>";

} catch (Exception $ex) {
  print $ex->getMessage() . "<br><br>";
}

try {
  $book = new Libro("109", "El cuento de peter pan", "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.", 
    "15.2", "Joaquin Pereira", "978-84-376-0494-7", "Anaya", 200, "Español", "Tapa dura", 500, "20x15x2", "09-12-2000" , "16-01-2001", "Fantasia");

  $bookSerialized = JsonBookSerializer::serialize($book);
  var_dump($bookSerialized);
  print "<br><br>";
  
  $bookUnserialized = JsonBookSerializer::unserialize($bookSerialized);
  var_dump($bookUnserialized);
  print "<br><br>";
  
} catch (Exception $ex) {
  print $ex->getMessage() . "<br><br>";
}

/*
try {
    $e1 = new Client("ayoub adam", "ayoub@gmail", "12345678", "667036982", "calle mayor", "22-03-2003", 23);
    $e2 = new Client("ayoub adam", "ayoub@gmail", "12345678", "667036982", "calle mayor", "22-03-2003", 23);
    $e3 = new Client("ayoub adam", "ayoub@gmail", "12345678", "667036982", "calle mayor", "22-03-2003", 23);

    $e = array($e1, $e2, $e3);
    var_dump($e);
    $jsonC = json_encode($e);   //al implementar JsonSerialize retornen el array adient
    print "<br><br><br>";
    var_dump($jsonC);

    $clientObj = json_decode($jsonC);  //amb json_decode obtenim un objecte de stdClass 
    print "<br><br><br>";
    var_dump($clientObj); 
} catch (Exception $ex) {
    print $ex->getMessage();
}*/