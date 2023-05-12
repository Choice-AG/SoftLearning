<?php

class ErrorExplain {
  public static function StringErrorCode(int $error): string {
    switch ($error) {
      case -1: 
        return "El string es nulo<br><br>";
      case -2: 
        return "El string está vacio<br><br>";
      case -3: 
        return "El string introducido es demasiado corto<br><br>";
      default: 
        return "";
    }
  }
}