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

        if(static::isWord($number)) return $number;

        if(!preg_match("/^[-\+]?[0-9]+$/", $number . '')) throw new InvalidNumberException($number);
        $sign = $number < 0 ? '-' : '';
        $number = abs($number);
        $output = static::__toLetters($number);

        return "$sign$output";
    }

    public static function toNumber($letters) {
        
        if(static::isNumber($letters)) return (int) $letters;
        
        $letters = strtoupper($letters);
        if(!preg_match("/^[-\+]?[A-Z]+$/", $letters)) throw new InvalidNumberException($letters);
        

        $sign = $letters[0] === '-' ? -1 : 1;
        $output = (int)static::__toNumber($letters);

        return $sign * $output;
    }


    /**
     * Checks if two values (string or numbers) are equal in this system. 
     * @param string|int $val1 letters or number
     * @param string|int $val2 letters or number
     * @note The type of the values will be checked, so don't worry about the types.
     * @return bool
     */
    public static function isEqual($val1, $val2) {
        if(static::isNumber($val1) && static::isNumber($val2)) return $val1 == $val2;
        if(static::isWord($val1) && static::isWord($val2)) return strcasecmp($val1, $val2) === 0; 

        return static::toNumber($val1) == static::toNumber($val2);
    }

    private static function isWord($val): bool 
    {
        return (bool) preg_match("/^[-\+]?[A-Z]+$/", $val);
    }

    private static function isNumber($val): bool
    {
        return (bool) preg_match("/^[-\+]?[0-9]+$/", $val . "");
    }
}
?>