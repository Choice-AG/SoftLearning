<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../model/products/Libro.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlBookAdapter.php';

$persistence = new MysqlBookAdapter();
$message = "Unsucessfully Request: ";

$id = (int)filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = (int)filter_input(INPUT_POST, 'price');
$author = filter_input(INPUT_POST, 'author');
$editorial = filter_input(INPUT_POST, 'editorial');
$pages = (int)filter_input(INPUT_POST, 'pages');
$language = filter_input(INPUT_POST, 'language');
$format = filter_input(INPUT_POST, 'format');
$weight = (int)filter_input(INPUT_POST, 'weight');
$dimensions = filter_input(INPUT_POST, 'dimensions');
$publication_date = filter_input(INPUT_POST, 'publication_date');
$available_date = filter_input(INPUT_POST, 'available_date');
$genre = filter_input(INPUT_POST, 'genre');


if ($id) {
  $message = "";
  try {
    $b = $persistence->getBook($id);
    if ($name) {
      $b->setName($name);
      $message .= "Name changed;";
    }
    if ($description) {
      $b->setDescription($description);
      $message .= "Description changed;";
    }
    if ($price) {
      $b->setPrice($price);
      $message .= "Price changed;";
    }
    if ($author) {
      $b->setAuthor($author);
      $message .= "Author changed;";
    }
    if ($editorial) {
      $b->setEditorial($editorial);
      $message .= "Editorial changed;";
    }
    if ($pages) {
      $b->setPages($pages);
      $message .= "Pages changed;";
    }
    if ($language) {
      $b->setLanguage($language);
      $message .= "Language changed;";
    }
    if ($format) {
      $b->setFormat($format);
      $message .= "Format changed;";
    }
    if ($weight) {
      $b->setWeight($weight);
      $message .= "Weight changed;";
    }
    if ($dimensions) {
      $b->setDimensions($dimensions);
      $message .= "Dimensions changed;";
    }
    if ($publication_date) {
      $b->setPublicationDate($publication_date);
      $message .= "Publication date changed;";
    }
    if ($available_date) {
      $b->setAvailableDate($available_date);
      $message .= "Available date changed;";
    }
    if ($genre) {
      $b->setGenre($genre);
      $message .= "Genre changed;";
    }
    $persistence->updateBook($b);
    $message .= " -> Book " . $b->getId() . " updated";
  } catch (ServiceException $ex) {
    $message .= $ex->getMessage();
  }
} else {
  $message .= "No data found";
}

setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/BookActionResponse.php');