<?php

use phpCodeKatas\Potter;

/**
 * PotterTest
 *
 * Unittests for the Potter Kata
 * 
 * Sorry, this is the same test with differen data provider, but i want to show
 * thats i used TTD for this kata
 * 
 * usually i would unite this tests to one test with a big data provider
 *
 * @author j.krause <info@kraeuschen.de>
 */
class PotterTest extends PHPUnit_Framework_TestCase
{
    /**
     * basic tests
     * 
     * @dataProvider basicPriceProvider
     * 
     * @return void
     */
    public function testBasicPrices($expected, array $books)
    {
        $potter = new Potter();
        $this->assertEquals($expected, $potter->getPrice($books));
    }

    /**
     * simple discount prices tests
     * 
     * @dataProvider simpleDiscountPriceProvider
     * 
     * @return void
     */
    public function testSimpleDiscountPrices($expected, array $books)
    {
        $potter = new Potter();
        $this->assertEquals($expected, $potter->getPrice($books));
    }

    /**
     * several discount prices tests
     * 
     * @dataProvider severalDiscountPriceProvider
     * 
     * @return void
     */
    public function testSeveralDiscountPrices($expected, array $books)
    {
        $potter = new Potter();
        $this->assertEquals($expected, $potter->getPrice($books));
    }

    /**
     * edge cases tests
     * 
     * @dataProvider edgeCasesProvider
     * 
     * @return void
     */
    public function testEdgeCases($expected, array $books)
    {
        $potter = new Potter();
        $this->assertEquals($expected, $potter->getPrice($books));
    }

    /**
     * data provider for base price test
     * 
     * @return array
     */
    public function basicPriceProvider()
    {
        return array(
                     array(0,  array()),
                     array(0,  array(0)),
                     array(8,  array(1)),
                     array(8,  array(2)),
                     array(8,  array(3)),
                     array(8,  array(4)),
                     array(8,  array(5)),
                     array(0,  array(0, 0)),
                     array(16, array(1, 1)),
                     array(24, array(2, 2, 2))
        );
    }

    /**
     * data provider for simple discount price test
     * 
     * @return array
     */
    public function simpleDiscountPriceProvider()
    {
        return array(array((8 * 2 * 0.95), array(1, 2)),
                     array((8 * 3 * 0.9),  array(1, 3, 5)),
                     array((8 * 4 * 0.8),  array(1, 2, 3, 5)),
                     array((8 * 5 * 0.75), array(1, 2, 3, 4, 5))
        );
    }

    /**
     * data provider for several discount price test
     * 
     * @return array
     */
    public function severalDiscountPriceProvider()
    {
        return array(array(8 + (8 * 2 * 0.95),             array(1, 1, 2)),
                     array(2 * (8 * 2 * 0.95),             array(1, 1, 2, 2)),
                     array((8 * 4 * 0.8) + (8 * 2 * 0.95), array(1, 1, 2, 3, 3, 4)),
                     array(8 + (8 * 5 * 0.75),             array(1, 2, 2, 3, 4, 5))
        );
    }

    /**
     * data provider for edge cases
     * 
     * @return array
     */
    public function edgeCasesProvider()
    {
        return array(array(2 * (8 * 4 * 0.8), array(1, 1, 2, 2, 3, 3, 4, 5)),
                     array(3 * (8 * 5 * 0.75) + 2 * (8 * 4 * 0.8), array(1, 1, 1, 1, 1,
                                                                         2, 2, 2, 2, 2,
                                                                         3, 3, 3, 3,
                                                                         4, 4, 4, 4, 4,
                                                                         5, 5, 5, 5))
        );
    }
}