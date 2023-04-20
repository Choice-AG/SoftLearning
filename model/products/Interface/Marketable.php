<?php

interface Marketable {
    public function getId(): string;
    public function getName(): string;
    public function getPrice(): float;
    public function getAuthor(): string;
    public function getDetails(): string;
}