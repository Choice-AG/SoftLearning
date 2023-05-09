<?php
declare (strict_types=1);

class Checker
{

    public static function StringValidator(string $s, int $size): int
    {
        if ($s == null) {
            return -1;
        }
        if (trim($s) === "") {
            return -2;
        }
        if (strlen(trim($s)) < $size) {
            return -3;
        }
        return 0;
    }

    public static function NumberValidator(int $n): int
    {
        if ($n === 0) {
            return -1;
        }
        if ($n < 0) {
            return -2;
        }
        return 0;
    }

    /* public static function checkEmail(): {
    }
    */
    public static function ExplainStringErrorCode(int $error): string
    {
        switch ($error) {
            case -1:
                return "Se ha introducido un string nulo.";
            case -2:
                return "Se ha introducido un string vacio.";
            case -3:
                return "Se ha introducido un string demasiado corto.";
        }
        return "";
    }

    public static function checkEmail(string $n): int
    {
        $array = [];
        if (preg_match("/^([a-zA-Z_0-9\.]{8,25})(@)([a-z]{3,})\.([a-z]{3})$/", $n, $array)) {
            return 0;
        } else {
            throw new Exception("<br><br>Fallo introducir email");
        }
    }

    public static function checkDNI(string $dni, array &$array)
    {
        if (preg_match("/^(\d{8})[- ]?([A-Z])$/", $dni, $array)) {
            echo "Se han encontrado coincidencias <br>";
            ValidateDNI($array[1], $array[2]);
        } else
            throw new Exception("No se han encontrado coincidencias");
    }

    public static function DniValidator(string $dni, string $letra)
    {
        $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
        $dni = intval($dni);
        $modulo = $dni % 23;
        $letraNum = $letras[$modulo];

        if ($letraNum == $letra)
            echo "DNI correcto";
        else
            echo "DNI incorrecto";
    }

    public static function CheckISBN(string $isbn, array &$array)
    {
        if (
            (preg_match("/^(\d{3})-(\d{1})-(\d{2})-(\d{6})-(\d{1})$/", $isbn, $array) && strlen(str_replace("-", "", $isbn)) == 13) ||
            preg_match("/^(\d{1,5})-(\d{1,7})-(\d{1,7})-(\d{1})$/", $isbn, $array) && strlen(str_replace("-", "", $isbn)) == 10
        ) {
            echo "Se encontró una coincidencia.<br>";
            ValidateISBN($isbn, $array[sizeof($array) - 1]);
        } else {
            throw new Exception("No se encontró ninguna coincidencia.");
        }
    }

    public static function IsbnValidator(string $isbn, string $fin)
    {
        $isbn = str_replace("-", "", $isbn);
        $result = 0;
        if (strlen($isbn) == 13) {
            for ($i = 1; $i <= 12; $i++) {
                if ($i % 2 != 0) {
                    $result += intval($isbn[$i - 1]);
                } else
                    $result += intval($isbn[$i - 1]) * 3;
            }

            $residuo = $result % 10;
            if ($residuo == 0 && $fin == 0) {
                echo "ISBN correcto";
            } else {
                if (10 - $residuo == $fin) {
                    echo "ISBN correcto";
                } else
                    echo "ISBN incorrecto";
            }
        } else if (strlen($isbn) == 10) {
            for ($i = 0; $i < 9; $i++) {
                $result += intval($isbn[$i]) * ($i + 1);
            }
            $residuo = $result % 11;

            if ($residuo == 0 && $fin == 0) {
                echo "ISBN correcto";
            } else {
                if ($residuo == $fin) {
                    echo "ISBN correcto";
                } else
                    echo "ISBN incorrecto";
            }
        }
    }

    public static function checkDate(string $data)
    {
        if (Checker::StringValidator($data, 10) == 0) {
            try {
                return new DateTime($data);
            } catch (DateException $ex) {
                throw new DateException("Error al introducir la fecha");
            }
        } else {
            throw new DateException("Bad, Date, String To short");
        }
    }
}