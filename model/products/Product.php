<?php
include_once '../checks/checker.php';

abstract class Product {

    protected string $id;
    protected string $name;
    protected string $description;
    protected string $price;
    protected string $author;

    //Construtor (Protegido) -> id, name, description, price, author
    public function __construct(string $id, string $name, string $description, string $price, string $author) {
            $message = "";
            $error = $this->setId($id);
            if ($error != 0) {
                $message .= "Bad Id;";
            }
            $error = $this->setName($name);
            if ($error != 0) {
                $message .= "Bad Name;";
            }
            $error = $this->setDescription($description);
            if ($error != 0) {
                $message .= "Bad Description;";
            }
            $error = $this->setPrice($price);
            if ($error != 0) {
                $message .= "Bad Price;";
            }
            $error = $this->setAuthor($author);
            if ($error != 0) {
                $message .= "Bad Author;";
            }
            if(strlen($message) > 0){
                throw new BuildException($message);
            }
        }
    

    //Getters
    public function getId(): string {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): string {
        return $this->price;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    //Setters (Protegidos)

    public function setId(string $id): int {
        $error = Checker::StringValidator($id, 2);
        if ($error == 0) {
            $this->id = $id;
        }
        return $error;
    }
    public function setName(string $name): int {
        $error = Checker::StringValidator($name, 2);
        if ($error == 0) {
            $this->name = $name;
        }
        return $error;
    }

    public function setDescription(string $description): int {
        $error = Checker::StringValidator($description, 5);
        if ($error == 0) {
            $this->description = $description;
        }
        return $error;
    }

    public function setPrice(string $price): int {
        $error = Checker::StringValidator($price, 1);
        if ($error == 0) {
            $this->price = $price;
        }
        return $error;
    }

    public function setAuthor(string $author): int {
        $error = Checker::StringValidator($author, 2);
        if ($error == 0) {
            $this->author = $author;
        }
        return $error;
    }
    
}