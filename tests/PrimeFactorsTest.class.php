<?php

require_once('../src/PrimeFactors.class.php');

use phpCodeKatas\PrimeFactors;
use \ArrayObject;

/**
 * PrimeFactorsTest.class.php
 *
 * Unittests of Prime Factors Kata
 *
 * @author j.krause <jankrause08@googlemail.com>
 */
class PrimeFactorsTest extends PHPUnit_Framework_TestCase
{
    /**
     * build the expected Array Object
     *
     * @param array $ints
     *
     * @return ArrayObject
     */
    private function _list(array $ints)
    {
        $list = new ArrayObject();

        foreach ($ints as $i) {
            $list->append($i);
        }

        return $list;
    }

    /**
     * one cant be an prime count
     *
     * @return void
     */
    public function testOne()
    {
        $this->assertEquals($this->_list(array()), PrimeFactors::generate(1));
    }

    /**
     * returns an 0 => 2
     *
     * @return void
     */
    public function testTwo()
    {
        $this->assertEquals($this->_list(array(2)), PrimeFactors::generate(2));
    }

    /**
     * returns an 0 => 3
     *
     * @return void
     */
    public function testThree()
    {
        $this->assertEquals($this->_list(array(3)), PrimeFactors::generate(3));
    }

    /**
     * returns 0 => 2, 1 => 2
     *
     * @return void
     */
    public function testFour()
    {
        $this->assertEquals($this->_list(array(2, 2)), PrimeFactors::generate(4));
    }

    /**
     * returns an 0 => 2, 1 => 3
     *
     * @return void
     */
    public function testFive()
    {
        $this->assertEquals($this->_list(array(2, 3)), PrimeFactors::generate(6));
    }

    /**
     * returns 0 => 2, 1 => 2, 2 => 2
     *
     * @return void
     */
    public function testSix()
    {
        $this->assertEquals($this->_list(array(2, 2, 2)), PrimeFactors::generate(8));
    }

    /**
     * return 0 => 3, 1 => 3
     *
     * @return void
     */
    public function testSeven()
    {
        $this->assertEquals($this->_list(array(3, 3)), PrimeFactors::generate(9));
    }

    /**
     * returns 0 => 2, 1 => 2, 2 => 5
     *
     * @return void
     */
    public function testEight()
    {
        $this->assertEquals($this->_list(array(2, 2, 5)), PrimeFactors::generate(20));
    }

    /**
     * returns 0 => 3, 1 => 3, 2 => 11
     *
     * @return void
     */
    public function testNine()
    {
        $this->assertEquals($this->_list(array(3, 3, 11)), PrimeFactors::generate(99));
    }
}
