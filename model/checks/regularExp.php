<?php

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

$email = "aaaa@aaaaa.com";
if (preg_match("/^([a-zA-Z0-9_]+)(@)([a-z]+)(\.)([a-z]+)$/", $email)) {
  echo "email correcto";
} else {
  echo "email incorrecto";
}

echo "<br><br>";

$dni = "11111111A";
if (preg_match("/^(\d{8})([a-zA-Z])$/", $dni)) {
  echo 0;
} else {
  echo -1;
}