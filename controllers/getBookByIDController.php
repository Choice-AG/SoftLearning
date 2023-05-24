<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../model//products/Libro.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlBookAdapter.php';
include_once '../model/appservices/XMLSerializerBase.php';
include_once '../model/appservices/book/JsonBookSerializer.php';
include_once '../model/appservices/book/XmlBookSerializer.php';

$persistence = new MysqlBookAdapter();
$message = "Unsucessfully Request: ";
$id = (int)filter_input(INPUT_POST, 'id');
$json = (bool)filter_input(INPUT_POST, 'json');
$xml = filter_input(INPUT_POST, 'xml');

if ($id) {
    try {
        if (filter_input(INPUT_POST, 'json') == true) {
            $message = "JSON: ";
            $bookJsonSerializer = new JsonBookSerializer();
            $message .= $bookJsonSerializer->serialize($persistence->getBook($id));
        } else if (filter_input(INPUT_POST, 'xml') == true) {
            $message = "XML: ";
            $bookXmlSerializer = new XMLBookSerializer();
            $message .= $bookXmlSerializer->serialize($persistence->getBook($id));
            $message .= "<pre>" . htmlspecialchars($bookXmlSerializer->serialize($persistence->getBook($id))) . "</pre>";
        } else {
            $book = $persistence->getBook($id);
            $message = "Book: " . $book->getId() . ";" . $book->getName() . ";" . $book->getDescription() . ";" . 
                        $book->getPrice() . ";" . $book->getAuthor() . ";" . $book->getIsbn() . ";" . 
                        $book->getEditorial() . ";" . $book->getPages() . ";" . $book->getLanguage() . ";" . $book->getFormat() . " " . 
                        $book->getWeight() . ";" . $book->getDimensions() . ";" . $book->getPublicationDateMysql() . ";" . 
                        $book->getAvailableDateMysql() . ";" . $book->getGenre();
        }
    } catch (ServiceException $ex) {
        $message .= $ex->getMessage();
    }
} else {
    $message .= "No data found";
}

setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/BookActionResponse.php');
