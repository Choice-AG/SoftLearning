<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../model/stakeholders/Client.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlClientAdapter.php';

$persistence = new MysqlClientAdapter();
$message = "Unsucessfully Request: ";

$client_id = (int) filter_input(INPUT_POST, 'client_id');
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

if ($client_id) {
  if ($persistence->idExists($client_id)) {
    $c = $persistence->getClient($client_id);
    $message = "";
    try {
      if ($name) {
        if ($c->setName($name) == 0) {
          $c->setName($name);
          $message .= "Name changed;";
        } else {
          $message .= "Bad Name;";
        }
      }
      if ($phone) {
        if ($c->setPhone($phone) == 0) {
          $c->setPhone($phone);
          $message .= "Phone changed;";
        } else {
          $message .= "Bad Phone;";
        }
      }
      if ($email) {
        if ($c->setEmail($email) == 0) {
          $c->setEmail($email);
          $message .= "Email changed;";
        } else {
          $message .= "Bad Email;";
        }
      }
      if ($address) {
        if ($c->setAddress($address) == 0) {
          $c->setAddress($address);
          $message .= "Address changed;";
        } else {
          $message .= "Bad Address;";
        }
      }
      if (!$address and !$email and !$phone and !$name) {
        $message .= "No data added to change";
      } else {
        $persistence->updateClient($c);
        $message .= " -> Client " . $c->getClientId() . " updated";
      }
    } catch (ServiceException $ex) {
      $message .= $ex->getMessage();
    }
  } else {
    $message .= "Client with id: " . $client_id . " does not exist";
  }
} else {
  $message .= "Filling the ID is mandatory";
}


setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/ClientActionResponse.php');