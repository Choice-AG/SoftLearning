<?php

include '../../exceptions/ServiceException.php';
include '../../model/checks/checker.php';
include '../../model/products/Libro.php';
include '../../persistence/MysqlAdapter.php';
include '../../persistence/MysqlBookAdapter.php';

$book = new Libro("1", "El cuento de peter pan", "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.", 
"15.2", "Joaquin Pereira", "978-84-376-0494-7", "Anaya", 200, "Español", "Tapa dura", 500, "20x15x2", "29-12-2022" , "17-01-2023", "Fantasia");
$db = new MysqlBookAdapter();

if ($db->isConnected()) {
    print "CONEXIÓN ESTABLECIDA<br><br>";

    try {
        $b = $db->getBook(1);
        print "ID DE LIBRO: <br><br>";
        var_dump($b);
    } catch (ServiceException $ex) {
        print $ex->getMessage();
    }
    print "<br><br>";

    try {
        if ($db->addBook($book)) {
            print "LIBRO" . $book->getId() . " AÑADIDO";
            $b = $db->getBook(1);
            var_dump($b);
        } else {
            print "LIBRO " . $book->getId() ." NO AÑADIDO";
        }
    } catch (ServiceException $ex) {
        print "NO SE HA AÑADIDO EL LIBRO";
        print $ex->getMessage();
    }
    
    try {
        $book->setName("El viaje de chihiro");
        $db->updateBook($book);
        print "<br><br>LIBRO ACTUALIZADO<br><br>";
        $b = $db->getBook(1);
        var_dump($b);
    } catch (ServiceException $ex) {
        print "<br><br>NO HEMOS ACTUALIZADO AL CLIENTE<br><br>";
        print $ex->getMessage();
    }
    print "<br><br>";
    try {
        $db->getBook(1);
        print "LIBRO ELIMINADO<br><br>";
    } catch (ServiceException $ex) {
        print "NO SE HA ELIMINADO EL LIBRO<br><br>";
        print $ex->getMessage();
    }
    
    try {
        $b = $db->getBook(1);
        print "OBTENER UN LIBRO POR ID: <br><br>";
        var_dump($b);
    } catch (ServiceException $ex) {
        print $ex->getMessage();
    }
    
} else {
    print "CONEXIÓN NO ESTABLECIDA<br><br>";
}

