<?php
include "./calculator.php";


use Biboletin\Calculator;

class CalculatorTest extends PHPUnit\Framework\TestCase
{
    public function testEquals()
    {
        $this->assertEquals(5, Calculator::add(3, 2));
    }
}
