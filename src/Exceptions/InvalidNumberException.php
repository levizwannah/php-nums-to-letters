<?php
namespace LeviZwannah\PhpNumsToLetters\Exceptions;

use Exception;

class InvalidNumberException extends Exception {
    public function __construct($number)
    {   
        parent::__construct("$number is Invalid. Only Integers are supported");
    }
}