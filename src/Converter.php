<?php 
namespace LeviZwannah\PhpNumsToLetters;

class Converter {

    public static function toLetters($number) {
        $number = $number . '';
        $parts = preg_split("/\./", $number);
        $isDecimal = false;

        if(count($parts) === 2) $isDecimal = true;

        $parts[0] = (int) $parts[0];

        $output = '';

        if($parts[0] == 0) $output .= 'A';

        while($parts[0] != 0) {
            $letter = chr(65 + ($parts[0] % 26));
            $output = $letter . $output;
            $parts[0] = (int) ($parts[0] / 26);
        }

        return $output;
    }

    public static function toNumber($letters) {
        $parts = preg_split("/\./", $letters);
        $isDecimal = false;

        if(count($parts) === 2) $isDecimal = true;

        $output = 0;
        $length = strlen($parts[0]);

        for($i = $length - 1; $i >= 0; $i--) {
            $digit = ord($parts[0][$i]) - 65;
            $output += pow(26, $length - $i - 1) * $digit;
        }

        return intval($output);
    }
}
?>