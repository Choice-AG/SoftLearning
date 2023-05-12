<?php

include_once '../model/appservices/XMLSerializerBase.php';

class XMLClientSerializer extends XMLSerializerBase{
  public function serialize(Client $c): string{
    $jsonC = json_encode($c);
    $clientObj = json_decode($jsonC);
    return '<?xml version="1.0" encoding="UTF-8"?> <client>' . $this->objectSerialize($clientObj) . '</client>';
  }

  public function unserialize(string $stringXML): Client{
    $client = new simpleXMLElement($stringXML);
    return new Client($client->name, $client->ident, $client->phone, $client->email, $client->address, 
      $client->birthday, (int)$client->clientId);
  }
}
