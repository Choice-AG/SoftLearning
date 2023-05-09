<?php

if (preg_match("/php/i", "PHP es el lenguaje de secuencias de comandos web preferido.")) {
  echo "Se encontró una coincidencia.";
} else {
  echo "No se encontró ninguna coincidencia.";
}

if (preg_match("/^\d{4,6}.[A-Z]$/", "1234.Z")) {
  echo "<br><br>Se encontró una coincidencia.";
} else {
  echo "<br><br>No se encontró ninguna coincidencia.";
}
echo "<br><br>";

$operation = "25+15=40";
$array = [];
if (preg_match("/^(\d+)([+\-*\/])(\d+)=(\d+)$/", $operation, $array)) {
  $num1 = $array[1];
  echo "Num1: " . $num1 . "<br>";
  $operator = $array[2];
  echo "Operator: " . $operator . "<br>";
  $num2 = $array[3];
  echo "Num2: " . $num2 . "<br>";
  $result = $array[4];
  echo "Result: " . $result . "<br><br>";
  $operation = false;

  switch ($operator) {
    case "+":
      if ($num1 + $num2 == $result) {
        $operation = true;
      }
      break;
    case "-":
      if ($num1 - $num2 == $result) {
        $operation = true;
      }
      break;
    case "*":
      if ($num1 * $num2 == $result) {
        $operation = true;
      }
      break;
    case "/":
      if ($num1 / $num2 == $result) {
        $operation = true;
      }
      break;
  }
  if ($operation) {
    echo "Es una operacion " . $operator;
  } else {
    echo "No es una operacion";
  }
} else {
  echo "Datos erroneos";
}

echo "<br><br>";

function checkEmail(string $email): int {
  $array = [];
  if (preg_match("/^([a-zA-Z_0-9\.]{8,25})(@)([a-z]{3,})\.([a-z]{3})$/", $email, $array)) {
    return 0;
  } else {
    throw new Exception("<br><br>Fallo al introducir el email");
  }
}

try {
  $email = "goizane.olaneta02@gmail.com";
  $checkEmail = checkEmail($email);
  if ($checkEmail == 0) {
    print("<br>Email correcto");
  }
} catch (Exception $ex) {
  echo $ex->getMessage();
}