<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../model/stakeholders/Client.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlClientAdapter.php';
include_once '../model/appservices/XMLSerializerBase.php';
include_once '../model/appservices/clients/JsonClientSerializer.php';
include_once '../model/appservices/clients/XmlClientSerializer.php';

$persistence = new MysqlClientAdapter();
$message = "Unsucessfully Request: ";
$id = (int)filter_input(INPUT_POST, 'id');
$json = (bool)filter_input(INPUT_POST, 'json');
$xml = filter_input(INPUT_POST, 'xml');

if ($id) {
    try {
        if (filter_input(INPUT_POST, 'json') == true) {
            $message = "JSON: ";
            $clientJsonSerializer = new JsonClientSerializer();
            $message .= $clientJsonSerializer->serialize($persistence->getClient($id));
        } else if (filter_input(INPUT_POST, 'xml') == true) {
            $message = "XML: ";
            $clientXmlSerializer = new XMLClientSerializer();
            $message .= $clientXmlSerializer->serialize($persistence->getClient($id));
            //Para imprimir tal cual lo que recibe
            $message .= "<pre>" . htmlspecialchars($clientXmlSerializer->serialize($persistence->getClient($id))) . "</pre>";
        } else {
            $message .= "No data found";
        }
    } catch (ServiceException $ex) {
        $message .= $ex->getMessage();
    }
} else {
    $message .= "No data found";
}

setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/ClientActionResponse.php');
