<?php

class ErrorExplain {
  public static function StringErrorCode(int $error): string {
    switch ($error) {
      case -1: 
        return "<br><br><br>se ha intorucido un string nulo<br><br><br>";
      case -2: 
        return "<br><br><br>se ha intorucido un string vacio<br><br><br>";
      case -3: 
        return "<br><br><br>se ha intorucido un string demasiado corto<br><br><br>";
      default: return "";
    }
  }
}