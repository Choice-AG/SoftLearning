<?php

include_once 'Product.php';

class Cursos extends Product{

  protected int $duration;
  protected string $category;
  protected DateTime $endDate;
  protected DateTime $startDate;
  protected string $schedule;
  protected string $isRemote;
  protected string $language;

  //Constructor
  public function __construct(
    string $id, string $name, string $description, string $price, string $author, int $duration, string $category, string $endDate,
    string $startDate, string $schedule, string $isRemote, string $language) {
    parent::__construct($id, $name, $description, $price, $author);

    $message = "";
    $error = $this->setDuration($duration);
    if ($error != 0) {
      $message .= "Bad Duration;";
    }
    $error = $this->setCategory($category);
    if ($error != 0) {
      $message .= "Bad Category;";
    }
    try {
      $error = $this->setEndDate($endDate);
      if ($error != 0){
        $message .= "Bad End Date;";
      }
    } catch (BuildException $ex) {
        $message .= $ex->getMessage();
    }
    try {
      $error = $this->setStartDate($startDate);
      if ($error != 0){
        $message .= "Bad Start Date;";
      }
    } catch (BuildException $ex) {
        $message .= $ex->getMessage();
    }
    $error = $this->setSchedule($schedule);
    if ($error != 0) {
      $message .= "Bad Schedule;";
    }
    $error = $this->setIsRemote($isRemote);
    if ($error != 0) {
      $message .= "Bad Is Remote;";
    }
    $error = $this->setLanguage($language);
    if ($error != 0) {
      $message .= "Bad Language;";
    }
    if (strlen($message) > 0) {
      throw new BuildException($message);
    }
  }

  //Getters
  public function getDuration(): int{
    return $this->duration;
  }

  public function getCategory(): string{
    return $this->category;
  }

  public function getEndDate(): string{
    return $this->endDate->format("d-m-y");
  }

  public function getStartDate(): string{
    return $this->startDate->format("d-m-y");
  }

  public function getSchedule(): string{
    return $this->schedule;
  }

  public function getIsRemote(): string{
    return $this->isRemote;
  }

  public function getLanguage(): string{
    return $this->language;
  }

  //Setters
  public function setDuration(int $duration): int{
    $error = Checker::NumberValidator($duration);
    if ($error == 0) {
      $this->duration = $duration;
    }
    return $error;
  }

  public function setCategory(string $category): int{
    $error = Checker::StringValidator($category, 5);
    if ($error == 0) {
      $this->category = $category;
    }
    return $error;
  }

  public function setEndDate(string $endDate): int{
    $error = Checker::StringValidator($endDate, 10);
    if ($error == 0) {
      try {
        $this->endDate = new DateTime($endDate);
      } catch (Exception $ex) {
        throw new Exception("Error al introducir la fecha final");
      }
    }
    return $error;
  }

  public function setStartDate(string $startDate): int{
    $error = Checker::StringValidator($startDate, 10);
    if ($error == 0) {
      try {
        $this->startDate = new DateTime($startDate);
      } catch (Exception $ex) {
        throw new Exception("Error al introducir la fecha de inicio");
      }
    }
    return $error;
  }

  public function setSchedule(string $schedule): int{
    $error = Checker::StringValidator($schedule, 5);
    if ($error == 0) {
      $this->schedule = $schedule;
    }
    return $error;
  }

  public function setIsRemote(string $isRemote): int{
    $error = Checker::StringValidator($isRemote, 5);
    if ($error == 0) {
      $this->isRemote = $isRemote;
    }
    return $error;
  }

  public function setLanguage(string $language): int{
    $error = Checker::StringValidator($language, 3);
    if ($error == 0) {
      $this->language = $language;
    }
    return $error;
  }

  public function getDetails(): string{
    return $this->getDuration() . ";" . $this->getCategory() . ";" . $this->getEndDate() . ";" . $this->getStartDate() . ";" . $this->getSchedule() . 
    ";" . $this->getIsRemote() . ";" . $this->getLanguage();
  }
}