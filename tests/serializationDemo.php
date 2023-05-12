<?php

declare(strict_types=1);
include_once '../model/stakeholders/Client.php';
include_once '../model/checks/checker.php';
include_once '../model/appservices/clients/JsonClientSerializer.php';
include_once '../model/products/Libro.php';
include_once '../exceptions/DateException.php';
include_once '../exceptions/BuildException.php';
include_once '../model/appservices/book/JsonBookSerializer.php';
include_once '../model/appservices/clients/XmlClientSerializer.php';
include_once '../model/appservices/book/XmlBookSerializer.php';

try {
  $client = new Client("Alvaro Salas", "012", "656656656", "a.salas@gmail.com", "calle mayor", "02-02-2000", 23);

  $clientSerialized = JsonClientSerializer::serialize($client);
  print "CLIENT SERIALIZED JSON:<br>";
  var_dump($clientSerialized);
  print "<br><br>";
  
  $clientUnserialized = JsonClientSerializer::unserialize($clientSerialized);
  print "CLIENT UNSERIALIZED JSON:<br>";
  var_dump($clientUnserialized);
  print "<br><br>";

} catch (Exception $ex) {
  print $ex->getMessage() . "<br><br>";
}

try {
  $book = new Libro("109", "El cuento de peter pan", "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.", 
    "15.2", "Joaquin Pereira", "978-84-376-0494-7", "Anaya", 200, "Español", "Tapa dura", 500, "20x15x2", "09-12-2000" , "16-01-2001", "Fantasia");

  $bookSerialized = JsonBookSerializer::serialize($book);
  print "BOOK SERIALIZED JSON:<br>";
  var_dump($bookSerialized);
  print "<br><br>";
  
  $bookUnserialized = JsonBookSerializer::unserialize($bookSerialized);
  print "BOOK UNSERIALIZED JSON:<br>";
  var_dump($bookUnserialized);
  print "<br><br>";
  
} catch (Exception $ex) {
  print $ex->getMessage() . "<br><br>";
}


print "<br><br>";


try {
  $c = new Client("Alvaro Salas", "012", "656656656", "a.salas@gmail.com", "calle mayor", "02-02-2000", 23);  
  $clientXmlSerializer = new XMLClientSerializer(); 
  $stringXML = $clientXmlSerializer->serialize($c);
  
  print("CLIENT SELIALIZED XML (se ve en la consola):<br>");
  var_dump ($stringXML);
  print "<br><br>";
  print("CLIENT UNSERIALIZED XML:<br>");
  var_dump ($clientXmlSerializer->unserialize($stringXML));

} catch (Exception $ex){
  print $ex->getMessage() . "<br><br>";
}

print "<br><br>";

try {
  $book = new Libro("109", "El cuento de peter pan", "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.", 
    "15.2", "Joaquin Pereira", "978-84-376-0494-7", "Anaya", 200, "Español", "Tapa dura", 500, "20x15x2", "09-12-2000" , "16-01-2001", "Fantasia");
  $bookXmlSerializer = new XMLBookSerializer(); 
  $stringXML = $bookXmlSerializer->serialize($book);
  
  print("BOOK SELIALIZED XML (se ve en la consola):<br>");
  var_dump ($stringXML);
  print "<br><br>";
  print("BOOK UNSERIALIZED XML:<br>");
  var_dump ($bookXmlSerializer->unserialize($stringXML));

} catch (Exception $ex){
  print $ex->getMessage() . "<br><br>";
}
