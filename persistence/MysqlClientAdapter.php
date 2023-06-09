<?php

declare(strict_types=1);

class MysqlClientAdapter extends MysqlAdapter
{
  public function getClient(int $id): Client
  {
    $data = $this->readQuery("SELECT name,ident,phone,email,address,birthday,client_id FROM clients WHERE client_id =" . $id . ";");
    if (count($data) > 0) {
      return new Client(
        $data[0]["name"], $data[0]["ident"], $data[0]["phone"], $data[0]["email"],
        $data[0]["address"], $data[0]["birthday"],
        (int) $data[0]["client_id"]
      );
    } else {
      throw new ServiceException("Not Client found with id = " . $id);
    }
  }

  public function deleteClient(int $id): bool
  {
    try {
      return $this->writeQuery("DELETE FROM clients WHERE id = " . $id . ";");
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al borrar al usuario " . $id . "-->" . $ex->getMessage());
    }
  }

  public function addClient(Client $client): bool
  {
    try {
      return $this->writeQuery("INSERT INTO clients (name,ident,phone,email,address,birthday,client_id)" .
        " VALUES ('" . $client->getName() . "','" . $client->getIdent() . "','" .
        $client->getPhone() . "','" . $client->getEmail() . "','" . $client->getAddress()
        . "','" . $client->getBirthdayMysql() . "'," . $client->getClientId() . ");");
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al insertar cliente -->" . $ex->getMessage());
    }
  }

  public function updateClient(Client $client): bool
  {
    try {
      return $this->writeQuery(
        "UPDATE clients SET name = '" . $client->getName() .
        "', ident = '" . $client->getIdent() .
        "', phone = '" . $client->getPhone() .
        "', email = '" . $client->getEmail() .
        "', address = '" . $client->getAddress() .
        "', birthday = '" . $client->getBirthdayMysql() .
        "' WHERE client_id = " . $client->getClientId() . ";"
      );
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al actualizar el cliente -->" . $ex->getMessage());
    }
  }

  public function maxClientId(): int
  {
    try {
      $id = $this->readQuery("SELECT max(client_id) as last FROM clients;");
      return (int) $id[0]["last"];
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al leer clients -->" . $ex->getMessage());
    }
  }

  public function exists(string $ident): bool
  {
    try {
      $data = $this->readQuery("SELECT ident FROM clients WHERE ident = '" . $ident . "';");
      return count($data) > 0;
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al leer clients -->" . $ex->getMessage());
    }
  }

  public function idExists(int $id): bool
  {
    try {
      $data = $this->readQuery("SELECT client_id FROM clients WHERE client_id = " . $id . ";");
      return count($data) > 0;
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al leer clients -->" . $ex->getMessage());
    }
  }
}