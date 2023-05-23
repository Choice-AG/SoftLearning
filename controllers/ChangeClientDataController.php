<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../model/stakeholders/Client.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlClientAdapter.php';

$persistence = new MysqlClientAdapter();
$message = "Unsucessfully Request: ";

$client_id = (int)filter_input(INPUT_POST, 'client_id');
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

if ($client_id) {
  $message = "";
  try {
    $c = $persistence->getClient($client_id);
    if ($name) {
      $c->setName($name);
      $message .= "Name changed;";
    }
    if ($phone) {
      $c->setPhone($phone);
      $message .= "Phone changed;";
    }
    if ($email) {
      $c->setEmail($email);
      $message .= "Email changed;";
    }
    if ($address) {
      $c->setAddress($address);
      $message .= "Address changed;";
    }
    $persistence->updateClient($c);
    $message .= " -> Client " . $c->getClientId() . " updated";
  } catch (ServiceException $ex) {
    $message .= $ex->getMessage();
  }
} else {
  $message .= "No data found";
}

setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/ClientActionResponse.php');