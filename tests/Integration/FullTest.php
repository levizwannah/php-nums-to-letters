<?php 
namespace LeviZwannah\PhpNumsToLetters\Tests\Integration;

use LeviZwannah\PhpNumsToLetters\Converter;
use PHPUnit\Framework\TestCase;

class FullTest extends TestCase {
    
    public function testPositiveNumbers(): void
    {
        $this->assertEquals(127, Converter::toNumber('EX'));
    }

    public function testNegativeNumbers(): void 
    {
        $this->assertEquals(-100, Converter::toNumber('-DW'));
    }

    public function testLettersWithLeadingAs(){
        $this->assertEquals(0, Converter::toNumber('AAAAAAA'));
        $this->assertEquals(1, Converter::toNumber('AAAAAAAAAAB'));
    }

    public function testLettersWithEndingAs() {
        $this->assertEquals(pow(26, 3), Converter::toNumber('BAAA'));
    }

    public function testLowercaseLetters(){
        $this->assertEquals(-100, Converter::toNumber('-dw'));
    }
}