<?php

require_once('../src/FizzBuzz.class.php');

use phpCodeKatas\FizzBuzz;

/**
 * FizzBuzzTest.class.php
 *
 * Unittests for the Fizz Buzz Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    /**
     * data provider
     * 
     * @return array
     */
    public function dataProvider()
    {
        return array(array('1', 1),
                     array('2', 2),
                     array('Fizz', 3),
                     array('Fizz', 9),
                     array('4', 4),
                     array('Buzz', 5),
                     array('Buzz', 25),
                     array('FizzBuzz', 15),
                     array('FizzBuzz', 60));
    }

    /**
     * some checks for "non convertet" int values
     * 
     * @dataProvider dataProvider
     * 
     * @return void
     */
    public function testGetTextForNumberOne($expected, $input) {
        $fizzBuzz = new FizzBuzz();
        $return = $fizzBuzz->getTextForNumber($input);

        $this->assertEquals($expected, $return);
        $this->assertTrue(is_string($return));
    }

    /**
     * test for divible by three
     * 
     * @return void
     */
    public function testIsDivisibleByThree()
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertTrue($fizzBuzz->isDivisibleByThree(3));
        $this->assertTrue($fizzBuzz->isDivisibleByThree(6));
        $this->assertTrue($fizzBuzz->isDivisibleByThree(9));
    }

    /**
     * false test for divible by three
     * 
     * @return void
     */
    public function testIsDivisibleByThreeFalse()
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertFalse($fizzBuzz->isDivisibleByThree(2));
        $this->assertFalse($fizzBuzz->isDivisibleByThree(4));
        $this->assertFalse($fizzBuzz->isDivisibleByThree(5));
    }

    /**
     * test for divible by five
     * 
     * @return void
     */
    public function testIsDivisibleByFive()
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertTrue($fizzBuzz->isDivisibleByFive(5));
        $this->assertTrue($fizzBuzz->isDivisibleByFive(45));
        $this->assertTrue($fizzBuzz->isDivisibleByFive(125));
    }

    /**
     * false test for divible by five
     * 
     * @return void
     */
    public function testIsDivisibleByFiveFalse()
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertFalse($fizzBuzz->isDivisibleByFive(24));
        $this->assertFalse($fizzBuzz->isDivisibleByFive(41));
        $this->assertFalse($fizzBuzz->isDivisibleByFive(6));
    }

    /**
     * example test for a range
     * 
     * @return void
     */
    public function testGetString()
    {
        $fizzBuzz = new FizzBuzz();
        $result = $fizzBuzz->getString(90, 100);
        $this->assertEquals('FizzBuzz 91 92 Fizz 94 Buzz Fizz 97 98 Fizz Buzz', $result);
    }
}
