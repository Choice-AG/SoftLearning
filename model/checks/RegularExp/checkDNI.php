<?php
declare (strict_types=1);
function checkDNI(string $dni, array &$array) {
    if (preg_match("/^(\d{8})[- ]?([A-Z])$/", $dni, $array)) {
        echo "Se han encontrado coincidencias <br>";
        ValidateDNI($array[1], $array[2]);
    } 
    else throw new Exception("No se han encontrado coincidencias") ;
}
function ValidateDNI(string $dni, string $letra){
    $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
    $dni = intval($dni);
    $modulo = $dni % 23;
    $letraNum = $letras[$modulo];
    
    if($letraNum == $letra) echo "DNI correcto";
    else echo "DNI incorrecto";
}
try{
    $array = [];
    $dni = "12345678Z";
    echo checkDNI($dni, $array);
} catch (Exception $ex) {
    echo $ex->getMessage();
}