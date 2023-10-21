![Deployment tests](https://github.com/levizwannah/php-nums-to-letters/actions/workflows/php.yml/badge.svg) ![Development tests](https://github.com/levizwannah/php-nums-to-letters/actions/workflows/develop-php.yml/badge.svg?branch=develop)  
# PHP Numbers To Letter
This Library converts Integers to Letters using A-Z.
0 = A, 25 = Z, using that, we can convert any integer to a letter format.

## Installation
Install using composer
```bash
composer require levizwannah/php-nums-to-letters
```

## Methods
### toLetters($numbers)
Converts numbers to Letter format (Capital letters only);

```php
use LeviZwannah\PhpNumsToLetters\Converter;

$letters = Converter::toLetters(12345);
```

### toNumber($letters)
Converts letters to number format. The letters will be converted to uppercase first. 
```php
use LeviZwannah\PhpNumsToLetters\Converter;

$number = Converter::toNumber('AABC');
```

### isEqual($val1, $val2)
This method tries to efficiently compares $val1 and $val2. Either of them can be string|integers. The comparison will still work.

```php
use LeviZwannah\PhpNumsToLetters\Converter;

Converter::isEqual(1, 'B'); // true
Converter::isEqual(1, 1); // true;
Converter::isEqual('B', 'B'); // true;
Converter::isEqual(0, 'B'); // false
Converter::isEqual('dw', 'DW'); // true
```

## Note
### Capital Letters only
Only Capital letters are used. Not lowercase so that we don't have any confusion. Imagine an Invoice number being AaBbC. That doesn't look good. 

### Sign Numbers
When the number has a negative sign, the sign will be preserved in the conversion. For example,
-1 = -B and -C = -2. 

### Decimal
Only Integers are supported at the moment because 1/26 gives a very long decimal.

## Do the Math
With only 7 Letters, you can represent -8,031,810,176 to 8,031,810,176 numbers.

## Use cases
1. Beautiful Order Invoice Numbers from Order IDS or some random Number.
2. Representing IDs
