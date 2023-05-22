<?php

include '../../exceptions/ServiceException.php';
include '../../model/checks/checker.php';
include '../../model/stakeholders/Client.php';
include '../../persistence/MysqlAdapter.php';
include '../../persistence/MysqlClientAdapter.php';

$client = new Client("Alvaro", "12345678A", "666666666", "a.salas@gmail.com", "La calle de al lado n5", "1998-07-17", 1);
$db = new MysqlClientAdapter();

if ($db->isConnected()) {
    print "CONEXIÓN ESTABLECIDA<br><br>";

    try {
        $c = $db->getClient(1);
        print "ID DE CLIENTE: <br><br>";
        var_dump($c);
    } catch (ServiceException $ex) {
        print $ex->getMessage();
    }
    print "<br><br>";

    try {
        if ($db->addClient($client)) {
            print "CLIENTE" . $client->getClientId() . " AÑADIDO<br><br>";
            $c = $db->getClient(1);
            var_dump($c);
        } else {
            print "CLIENTE" . $client->getClientId() ." NO AÑADIDO<br><br>";
        }
    } catch (ServiceException $ex) {
        print "NO SE HA AÑADIDO AL CLIENTE <br><br>";
        print $ex->getMessage();
    }

    try {
        $client->setName("Ethan");
        $db->updateClient($client);
        print "CLIENTE ACTUALIZADO<br><br>";
        $c = $db->getClient(1);
        var_dump($c);
    } catch (ServiceException $ex) {
        print "NO HEMOS ACTUALIZADO AL CLIENTE<br><br>";
        print $ex->getMessage();
    }
    print "<br><br>";
    try {
        $db->getClient(1);
        print "CLIENTE ELIMINADO<br><br>";
    } catch (ServiceException $ex) {
        print "NO SE HA ELIMINADO AL CLIENTE<br><br>";
        print $ex->getMessage();
    }
    
    try {
        $c = $db->getClient(1);
        print "OBTENER UN USUARIO POR ID: <br><br>";
        var_dump($c);
    } catch (ServiceException $ex) {
        print $ex->getMessage();
    }
    
} else {
    print "CONEXIÓN NO ESTABLECIDA<br><br>";
}

