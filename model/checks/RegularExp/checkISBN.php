<?php
declare (strict_types=1);
function CheckISBN(string $isbn, array &$array) {
    if ((preg_match("/^(\d{3})-(\d{1})-(\d{2})-(\d{6})-(\d{1})$/", $isbn, $array) && strlen(str_replace("-", "", $isbn)) == 13) || 
            preg_match("/^(\d{1,5})-(\d{1,7})-(\d{1,7})-(\d{1})$/", $isbn, $array) && strlen(str_replace("-", "", $isbn)) == 10) {
        echo "Se encontró una coincidencia.<br>";
        ValidateISBN($isbn, $array[sizeof($array)-1]);
    } 
    else {
        throw new Exception("No se encontró ninguna coincidencia.") ;
    }
}

function ValidateISBN(string $isbn, string $fin) {
    $isbn = str_replace("-", "", $isbn);
    $result = 0;
    if (strlen($isbn) == 13) {
        for ($i = 1; $i <= 12; $i++) {
            if ($i % 2 != 0) {
                $result += intval($isbn[$i - 1]);
            } 
            else $result += intval($isbn[$i - 1]) * 3;
        }

        $residuo = $result % 10;
        if ($residuo == 0 && $fin == 0) {
            echo "ISBN correcto";
        } else {
            if (10 - $residuo == $fin) {
                echo "ISBN correcto";
            } 
            else echo "ISBN incorrecto";
        }
    }
    else if(strlen($isbn) == 10){
        for($i = 0; $i < 9; $i++){
            $result += intval($isbn[$i])*($i+1);
            //echo "<br>Result: $result<br>Valor: ".$isbn[$i] ."*". $i+1;
        }
        //echo "<br>Result: $result<br>";
        $residuo = $result % 11;
        
        if($residuo == 0 && $fin == 0){
            echo "ISBN correcto";
        }
        else {
            if ($residuo == $fin) {
                echo "ISBN correcto";
            } 
            else echo "ISBN incorrecto";
        }
        
    }
}

try{
    $array = [];
    $isbn = "978-3-16-177333-4";
    $isbn2 = "1-1223452-5-9";
    CheckISBN($isbn2, $array);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
