<?php

interface Alquilable {
  public function getId(): string;
  public function getCosteAnual(): float;
  public function getAccessDetails(): string;
}