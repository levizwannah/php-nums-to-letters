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

    public function testDecimalNumbers(): void
    {
        $output = Converter::toNumber('EK.DW');
        $this->assertIsFloat($output);
        $this->assertEquals(110.100, $output);
    }
}