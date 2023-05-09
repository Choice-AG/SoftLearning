<?php
interface Storable {
    public function getIsbn(): string;
    public function getName(): string;
    public function getDimensions(): string;
    public function getPrice(): float;
    public function getDetails(): string;
}