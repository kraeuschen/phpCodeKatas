<?php

require_once('../src/NumberToLCD.class.php');

use phpCodeKatas\NumberToLCD;

/**
 * NumberToLCD.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 */
class NumberToLCDTest extends PHPUnit_Framework_TestCase
{
    protected $zero  = " - \n| |\n   \n| |\n - \n";
    protected $one   = "   \n  |\n   \n  |\n   \n";
    protected $two   = " - \n  |\n - \n|  \n - \n";
    protected $three = " - \n  |\n - \n  |\n - \n";
    protected $four  = "   \n| |\n - \n  |\n   \n";
    protected $five  = " - \n|  \n - \n  |\n - \n";
    protected $six   = " - \n|  \n - \n| |\n - \n";
    protected $seven = " - \n  |\n   \n  |\n   \n";
    protected $eight = " - \n| |\n - \n| |\n - \n";
    protected $nine  = " - \n| |\n - \n  |\n - \n";

    /**
     * @return void
     */
    public function testConvertShouldReturnZero()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->zero, $converter->convert(0));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnOne()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->one, $converter->convert(1));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnTwo()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->two, $converter->convert(2));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnThree()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->three, $converter->convert(3));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnFour()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->four, $converter->convert(4));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnFive()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->five, $converter->convert(5));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnSix()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->six, $converter->convert(6));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnSeven()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->seven, $converter->convert(7));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnEight()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->eight, $converter->convert(8));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnNine()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->nine, $converter->convert(9));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnFourtyTwo()
    {
        $converter = new NumberToLCD();
        $expected = $this->four . $this->two;
        $this->assertEquals($expected, $converter->convert(42));
    }

    /**
     * @return void
     */
    public function testConvertStringShouldReturnZero()
    {
        $converter = new NumberToLCD();
        $this->assertEquals($this->zero, $converter->convert('foo'));
    }

    /**
     * @return void
     */
    public function testConvertShouldReturnOneHundertSixtyEight()
    {
        $converter = new NumberToLCD();
        $expected = $this->one . $this->six . $this->eight;
        $this->assertEquals($expected, $converter->convert(168));
    }
}