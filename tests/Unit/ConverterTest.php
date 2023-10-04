<?php 
namespace LeviZwannah\PhpNumsToLetters\Tests\Unit;

use LeviZwannah\PhpNumsToLetters\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase {

    public function testToLetters(): void
    {
        $output = [];
        $actual = [];
        foreach(range(0, 25) as $number) {
            $actual[] = chr(65 + $number);
            $output[] = Converter::toLetters($number);
        }

        $this->assertEquals(json_encode($actual), json_encode($output));
    }

    public function testToNumbers(): void
    {
        $output = [];
        $actual = [];
        foreach(range(0, 25) as $number) {
            $actual[] = $number;
            $output[] = Converter::toNumber(chr(65 + $number));
        }

        $this->assertEquals(json_encode($actual), json_encode($output));
    }

    public function testSignedNumbers(): void
    {
        $this->assertEquals("-B", Converter::toLetters(-1));
    }

    public function testSignedLetters(): void 
    {
        $this->assertEquals(-1, Converter::toNumber("-B"));
    }
}