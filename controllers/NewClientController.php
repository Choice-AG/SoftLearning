<?php
declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../exceptions/BuildException.php';
include_once '../model/stakeholders/Client.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlClientAdapter.php';

$persistence = new MysqlClientAdapter();
$message = "Unsucessfully Request: ";

$name = filter_input(INPUT_POST, 'name');
$ident = filter_input(INPUT_POST, 'ident');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$birthday = filter_input(INPUT_POST, 'birthday');

if ($name and $ident and $phone and $email and $address and $birthday) {
  try {
    if ($persistence->exists($ident) === false) {
      $client_id = $persistence->maxClientid() + 1;
      $client = new Client($name, $ident, $phone, $email, $address, $birthday, $client_id);
      $persistence->addClient($client);
      $message = $client->getName() . ";" . $client->getIdent() . ";" . $client->getPhone() . ";" . 
                $client->getEmail() . ";" . $client->getAddress() . ";" . $client->getBirthdayMysql() . ";" . 
                " -> New client added";
    } else {
      $message .= "Client with that DNI Exists";
    }
  } catch (ServiceException $ex) {
    $message .= $ex->getMessage();
  } catch (BuildException $ex) {
    $message .= $ex->getMessage();
  }
} else {
  $message .= "Few fields data found";
}


setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/ClientActionResponse.php');