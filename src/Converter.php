<?php 
namespace LeviZwannah\PhpNumsToLetters;

use LeviZwannah\PhpNumsToLetters\Exceptions\InvalidNumberException;

class Converter {

    private static function __toNumber($letters) {

        $letters = preg_replace("/^A+/", "", $letters);

        $output = 0;
        $length = strlen($letters);

        for($i = $length - 1; $i >= 0; $i--) {
            
            if($letters[$i] === '-') continue;

            $digit = ord($letters[$i]) - 65;
            $output += pow(26, $length - $i - 1) * $digit;
        }

        return $output;
    }

    private static function __toLetters($number) {

        $output = '';

        if($number == 0) $output .= 'A';

        while($number != 0) {
            $letter = chr(65 + ($number % 26));
            $output = $letter . $output;
            $number = (int) ($number / 26);
        }

        return $output;
    }

    public static function toLetters($number) {

        if(!preg_match("/^[-\+]?[0-9]+$/", $number . '')) throw new InvalidNumberException($number);

        $sign = $number < 0 ? '-' : '';
        $number = abs($number);
        $output = static::__toLetters($number);

        return "$sign$output";
    }

    public static function toNumber($letters) {
        $letters = strtoupper($letters);
        if(!preg_match("/^[-\+]?[A-Z]+$/", $letters)) throw new InvalidNumberException($letters);

        $sign = $letters[0] === '-' ? -1 : 1;
        $output = (int)static::__toNumber($letters);

        return $sign * $output;
    }
}
?>