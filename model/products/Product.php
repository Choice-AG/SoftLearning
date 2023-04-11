<?php

abstract class Product {

    protected string $name;
    protected string $description;
    protected string $price;
    protected int $amount;
    protected DateTime $fabricationDate;

    //Construtor
    public function __construct(string $name, string $description,
            string $price, int $amount, string $fabricationDate) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->amount = $amount;
        $this->fabricationDate = new DateTime($fabricationDate);
    }

    //Getters
    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): string {
        return $this->price;
    }

    public function getAmount(): int {
        return $this->amount;
    }

    public function getFabricationDate(): string {
        return $this->fabricationDate->format("d-m-y");
    }

    //Setters
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setPrice(string $price): void {
        $this->price = $price;
    }

    public function setAmount(int $amount): void {
        $this->amount = $amount;
    }

    public function setFabricationDate(string $fabricationDate): void {
        $this->fabricationDate = new DateTime($fabricationDate);
    }

}
