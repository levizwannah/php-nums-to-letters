![All tests](https://github.com/levizwannah/php-nums-to-letters/actions/workflows/php.yml/badge.svg)  

# PHP Numbers To Letter
This Library converts numbers to Letters using A-Z.
0 = A, 25 = Z, using that, we can convert any number to a letter format. Even decimals.

## Methods
### toLetters($numbers)
Converts numbers to Letter format (Capital letters only);

### toNumber($letters)
Converts letters to number format. The letters will be converted to uppercase first. 

## Note
### Capital Letters only
Only Capital letters are used. Not lowercase so that we don't have any confusion. Image an Invoice number being AaBbC. That doesn't look good. 

### Sign Numbers
When the number has a negative sign, the sign will be preserved in the conversion. For example,
-1 = -B and -C = -2. 

### Decimal
When the number has a decimal point, the point will be preserved. For example
1.2 = B.C
C.D = 2.3;

## Do the Math
With only 7 Letters, you can represent -8,031,810,176 to 8,031,810,176 numbers.
