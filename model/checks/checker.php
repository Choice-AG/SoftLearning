<?php

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

    public static function CheckEmail(string $email): int{
        if (preg_match("/^([a-zA-Z0-9_]+)(@)([a-z]+)(\.)([a-z]+)$/", $email)) {
            return 0;
        } else {
            return -1;
        }
    }

    public static function CheckDNI(string $dni): int{
        if (preg_match("/^(\d{8})([a-zA-Z])$/", $dni)) {
            return 0;
        } else {
            return -1;
        }
    }
}
