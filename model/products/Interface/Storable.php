<?php
interface Storable {
    public function getId(): string;
    public function getName(): string;
    public function getPrice(): float;
    public function getDetails(): string;
}