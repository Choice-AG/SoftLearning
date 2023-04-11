<?php

class Checker {

    public static function StringValidator(string $s, int $size): int {
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

    public static function NumberValidator(int $n): int {
        if ($n == 0) {
            return -1;
        }
        if ($n < 0) {
            return -2;
        }
        return 0;
    }

}
