<?php

declare(strict_types=1);

class MysqlBookAdapter extends MysqlAdapter {
  public function getBook(int $id): Libro {
    $data = $this->readQuery("SELECT id,name,description,price,author,isbn,editorial,pages,language,
    format,weight,dimensions,publication_date,available_date,genre FROM books WHERE id = " . $id . ";");
    if (count($data) > 0){
        return new Libro($data[0]["id"], $data[0]["name"], $data[0]["description"], $data[0]["price"],
        $data[0]["author"], $data[0]["isbn"], $data[0]["editorial"], (int)$data[0]["pages"], $data[0]["language"], 
        $data[0]["format"], (int)$data[0]["weight"], $data[0]["dimensions"], $data[0]["publication_date"], 
        $data[0]["available_date"], $data[0]["genre"]);
    } else {
        throw new ServiceException("Not Book found with id = " . $id);
    }
  }

  public function deleteBook(int $id): bool {
    try {
        return $this->writeQuery("DELETE FROM books WHERE id = " . $id . ";");
    } catch (mysqli_sql_exception $ex) {
        throw new ServiceException("Error al borrar al usuario " . $id . "-->" .$ex->getMessage());
    }
  }

  public function addBook(Libro $book): bool {
    try {
        return $this->writeQuery("INSERT INTO books (id,name,description,price,author,isbn,editorial,pages,language,
        format,weight,dimensions,publication_date,available_date,genre)" .
                        " VALUES ('" . $book->getId() . "','" . $book->getName() . "','" .
                        $book->getDescription() . "'," . $book->getPrice() . ",'" . $book->getAuthor() 
                        . "','" . $book->getIsbn() . "','" . $book->getEditorial() . "'," . $book->getPages() . ",'" . 
                        $book->getLanguage() . "','" . $book->getFormat() . "'," . $book->getWeight() . ",'" . $book->getDescription() . "','" . 
                        $book->getPublicationDateMysql() . "','" . $book->getAvailableDateMysql() . "','" . $book->getGenre() . "');");
    } catch (mysqli_sql_exception $ex) {
        throw new ServiceException("Error al insertar libro -->" . $ex->getMessage());
    }
  }
  
  public function updateBook(Libro $book): bool {
    try { 
        return $this->writeQuery("UPDATE books SET name = '" . $book->getName() . "'," .
                        "description = '" . $book->getDescription() . "'," .
                        "price = '" . $book->getPrice() . "'," .
                        "author = '" . $book->getAuthor() . "'," .
                        "isbn = '" . $book->getIsbn() . "'," .
                        "editorial = '" . $book->getEditorial() . "'," .
                        "pages = " . $book->getPages() . "," .
                        "language = '" . $book->getLanguage() . "'," .
                        "format = '" . $book->getFormat() . "'," .
                        "weight = " . $book->getWeight() . "," .
                        "dimensions = '" . $book->getDimensions() . "'," .
                        "publication_date = '" . $book->getPublicationDateMysql() . "'," .
                        "available_date = '" . $book->getAvailableDateMysql() . "'," .
                        "genre = '" . $book->getGenre() . "'" .
                        "WHERE id = '" . $book->getId() . "';");
    } catch (mysqli_sql_exception $ex) {
        throw new ServiceException("Error al actualizar el libro -->" . $ex->getMessage());
    }
  }
  public function maxBookId(): int
  {
    try {
      $id = $this->readQuery("SELECT max(id) as last FROM books;");
      return (int)$id[0]["last"];
    } catch (mysqli_sql_exception $ex) {
      throw new ServiceException("Error al leer books -->" . $ex->getMessage());
    }
  }
  public function exists(string $isbn): bool {
    $data = $this->readQuery("SELECT id FROM books WHERE isbn = '" . $isbn . "';");
    return count($data) > 0;
  }
  public function idExists(int $id): bool {
    $data = $this->readQuery("SELECT id FROM books WHERE id = '" . $id . "';");
    return count($data) > 0;
  }

  public function isbnExists(string $isbn): bool {
    $data = $this->readQuery("SELECT isbn FROM books WHERE isbn = '" . $isbn . "';");
    return count($data) > 0;
  }
}
