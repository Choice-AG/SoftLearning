<?php
declare(strict_types=1);

include_once '../exceptions/BuildException.php';
include_once '../model/checks/Checker.php';
include_once '../model/products/Libro.php';
include_once '../persistence/MysqlAdapter.php';
include_once '../persistence/MysqlBookAdapter.php';

$persistence = new MysqlBookAdapter();
$message = "Unsucessfully Request: ";

$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = (int)filter_input(INPUT_POST, 'price');
$author = filter_input(INPUT_POST, 'author');
$isbn = filter_input(INPUT_POST, 'isbn');
$editorial = filter_input(INPUT_POST, 'editorial');
$pages = (int)filter_input(INPUT_POST, 'pages');
$language = filter_input(INPUT_POST, 'language');
$format = filter_input(INPUT_POST, 'format');
$weight = (int)filter_input(INPUT_POST, 'weight');
$dimensions = filter_input(INPUT_POST, 'dimensions');
$publication_date = filter_input(INPUT_POST, 'publication_date');
$available_date = filter_input(INPUT_POST, 'available_date');
$genre = filter_input(INPUT_POST, 'genre');

if ($name and $description and $price and $author and $isbn and $editorial and $pages and $language
    and $format and $weight and $dimensions and $publication_date and $available_date and $genre) {
  try {
    if ($persistence->isbnExists($isbn) === false) {
      $book_id = strval($persistence->maxBookId() + 1);
      $book = new Libro($book_id, $name, $description, $price, $author, $isbn, $editorial, $pages, $language, $format, $weight, $dimensions, $publication_date, $available_date, $genre);
      $persistence->addBook($book);
      $message = $book->getId() . ";" . $book->getName() . ";" . $book->getDescription() . ";" .
        $book->getPrice() . ";" . $book->getAuthor() . ";" . $book->getEditorial() . ";" .
        $book->getPages() . ";" . $book->getLanguage() . ";" . $book->getFormat() . ";" .
        $book->getWeight() . ";" . $book->getDimensions() . ";" . $book->getAvailableDateMysql() . ";" .
        $book->getAvailableDateMysql() . ";" . $book->getGenre() . ";" . " -> New book added";
    } else {
      $message .= "Book with that ISBN already exists";
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
header('location: ../views/BookActionResponse.php');