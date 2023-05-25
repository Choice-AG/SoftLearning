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
  if ($persistence->idExists($id)) {
    $c = $persistence->getBook($id);
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
      if ($description) {
        if ($c->setDescription($description) == 0) {
          $c->setDescription($description);
          $message .= "Description changed;";
        } else {
          $message .= "Bad Description;";
        }
      }
      if ($price) {
        if ($c->setPrice($price) == 0) {
          $c->setPrice($price);
          $message .= "Price changed;";
        } else {
          $message .= "Bad Price;";
        }
      }
      if ($author) {
        if ($c->setAuthor($author) == 0) {
          $c->setAuthor($author);
          $message .= "Author changed;";
        } else {
          $message .= "Bad Author;";
        }
      }
      if ($editorial) {
        if ($c->setEditorial($editorial) == 0) {
          $c->setEditorial($editorial);
          $message .= "Editorial changed;";
        } else {
          $message .= "Bad Editorial;";
        }
      }
      if ($pages) {
        if ($c->setPages($pages) == 0) {
          $c->setPages($pages);
          $message .= "Pages changed;";
        } else {
          $message .= "Bad Pages;";
        }
      }
      if ($language) {
        if ($c->setLanguage($language) == 0) {
          $c->setLanguage($language);
          $message .= "Language changed;";
        } else {
          $message .= "Bad Language;";
        }
      }
      if ($format) {
        if ($c->setFormat($format) == 0) {
          $c->setFormat($format);
          $message .= "Format changed;";
        } else {
          $message .= "Bad Format;";
        }
      }
      if ($weight) {
        if ($c->setWeight($weight) == 0) {
          $c->setWeight($weight);

          $message .= "Weight changed;";
        } else {
          $message .= "Bad Weight;";
        }

      }
      if ($dimensions) {
        if ($c->setDimensions($dimensions) == 0) {
          $c->setDimensions($dimensions);
          $message .= "Dimensions changed;";
        } else {
          $message .= "Bad Dimensions;";
        }
      }
      if ($publication_date) {
        if ($c->setPublicationDate($publication_date) == 0) {
          $c->setPublicationDate($publication_date);
          $message .= "Publication Date changed;";
        } else {
          $message .= "Bad Publication Date;";
        }
      }
      if ($available_date) {
        if ($c->setAvailableDate($available_date) == 0) {
          $c->setAvailableDate($available_date);
          $message .= "Available Date changed;";
        } else {
          $message .= "Bad Available Date;";
        }
      }
      if ($genre) {
        if ($c->setGenre($genre) == 0) {
          $c->setGenre($genre);
          $message .= "Genre changed;";
        } else {
          $message .= "Bad Genre;";
        }
      }
      if (!$name and !$description and !$price and !$author and !$editorial and !$pages and !$language and !$format and !$weight and !$dimensions and !$publication_date and !$available_date and !$genre) {
        $message .= "No data added to change";
      } else {
        $persistence->updateBook($c);
        $message .= " -> Book " . $c->getId() . " updated";
      }
    } catch (ServiceException $ex) {
      $message .= $ex->getMessage();
    }
  } else {
    $message .= "Book with id: " . $id . " does not exist";
  }
} else {
  $message .= "Filling the ID is mandatory";
}



setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/BookActionResponse.php');