<?php

use phpCodeKatas\StringCalculator;

/**
 * StringCalculatorTest
 *
 * Unittests for the StringCalculator Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class StringCalculatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * test wrapper
     * 
     * @param string $numbers
     */
    private function add($numbers)
    {
        $stringCalculator = new StringCalculator();
        return $stringCalculator->add($numbers);
    }
	
    /**
     * empty string given
     *
     * @return void
     */
    public function testShouldBeZeroEmptyString()
    {
        $this->assertEquals(0, $this->add(''));
    }
    
    /**
     * 1 given
     *
     * @return void
     */
    public function testShouldPassAsNumberOne()
    {
        $this->assertEquals(1, $this->add('1'));
    }
    
    /**
     * 3 given
     *
     * @return void
     */
    public function testShouldPassAsNumberThree()
    {
        $this->assertEquals(3, $this->add('3'));
    }
    
    /**
     * 1,3 given
     *
     * @return void
     */
    public function testShouldAddTwoNumbers()
    {
        $this->assertEquals(4, $this->add('1,3'));
    }
    
    /**
     * ,5 given
     *
     * @return void
     */
    public function testShouldAddTwoNumbersWithEmptyString()
    {
        $this->assertEquals(3, $this->add(',3'));
    }
    
    /**
     * 1,2,3,4,5,6,7,8,9,0 given
     *
     * @return void
     */
    public function testShouldAddMultipleNumbers()
    {
        $this->assertEquals(45, $this->add('1,2,3,4,5,6,7,8,9,0'));
    }
    
    /**
     * 1\n2,3 given
     *
     * @return void
     */
    public function testShouldAddWithNewLineInMiddle()
    {
        $this->assertEquals(6, $this->add("1\n2,3"));
    }
    
    /**
     * 1\n2,3\n,5\n6 given
     *
     * @return void
     */
    public function testShouldAddWithMultipleNewLinesInMiddle()
    {
        $this->assertEquals(17, $this->add("1\n2,3\n,5\n6"));
    }
    
    /**
     * //;1;7 given
     *
     * @return void
     */
    public function testShouldAllowCustomDelimiter()
    {
        $this->assertEquals(8, $this->add("//;\n1;7"));
    }
    
    /**
     * //@5@7 given
     *
     * @return void
     */
    public function testShouldAllowCustomDelimiterOtherSign()
    {
        $this->assertEquals(12, $this->add("//@\n5@7"));
    }
    
    /**
     * negative number should throw an Exception
     * 
     * @return void
     */
    public function testShouldThrowExceptionNegativeNumber()
    {
        $this->setExpectedException('InvalidArgumentException', 'negatives not allowed: -4');
        $this->add("-4");
    }
    
    /**
     * negative numbers should be imploded on Exception
     * 
     * @return void
     */
    public function testShouldThrowExceptionMultipleNegativeNumbers()
    {
        $this->setExpectedException('InvalidArgumentException', 'negatives not allowed: -4, -6');
        $this->add("-4,2,-6,3");
    }
}
