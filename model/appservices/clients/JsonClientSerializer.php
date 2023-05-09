<?php

class JsonClientSerializer {

  public static function serialize(Client $client): string {
    return json_encode($client);
  }

  public static function arraySerialize(array $client): string {
    return json_encode($client);
  }

  public static function unserialize(string $stringJson): Client {
    $client = json_decode($stringJson);
    return new Client($client->name, $client->ident, $client->phone, $client->email, $client->address, $client->birthday, $client->clientId);
  }
}