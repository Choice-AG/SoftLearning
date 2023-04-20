<?php

interface Marketable {
    public function getPrice(): float;
    public function getAuthor(): string;
}