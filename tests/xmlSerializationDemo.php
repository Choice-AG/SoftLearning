<?php
declare(strict_types=1);
include_once '../model/stakeholders/Client.php';
include_once '../model/appservices/clients/XmlClientSerializer.php';


try {
  $c = new Client("Alvaro Salas", "012", "656656656", "a.salas@gmail.com", "calle mayor", "02-02-2000", 23);  
  $clientXmlSerializer = new XMLClientSerializer(); 
  $stringXML = $clientXmlSerializer->serialize($c);
  
  var_dump ($stringXML);     //es mostra l’objecte serialitzat a XML  
  var_dump ($clientXmlSerializer->unserialize ( $stringXML ) );  //objecte deserialitzat 
} catch (Exception $ex){
  print $ex->getMessage() . "<br><br>";
}