<?php

use phpCodeKatas\KarateChop;

/**
 * KarateChopTest
 *
 * Unittests for the KarateChop Kata
 * 
 * @author j.krause <info@kraeuschen.de>
 */
class KarateChopTest extends PHPUnit_Framework_TestCase
{
    /**
     * data provider
     * 
     * @return array
     */
    public function dataProvider()
    {
        return array(array(-1, 3, array()),
                     array(-1, 3, array(1)),
                     array(0, 1, array(1)),
                     array(0, 1, array(1)),
                     array(0,  1, array(1, 3, 5)),
                     array(1, 3, array(1, 3, 5)),
                     array(2, 5, array(1, 3, 5)),
                     array(-1, 0, array(1, 3, 5)),
                     array(-1, 2, array(1, 3, 5)),
                     array(-1, 4, array(1, 3, 5)),
                     array(-1, 6, array(1, 3, 5)),
                     array(0, 1, array(1, 3, 5, 7)),
                     array(1, 3, array(1, 3, 5, 7)),
                     array(2, 5, array(1, 3, 5, 7)),
                     array(3, 7, array(1, 3, 5, 7)),
                     array(-1, 0, array(1, 3, 5, 7)),
                     array(-1, 2, array(1, 3, 5, 7)),
                     array(-1, 4, array(1, 3, 5, 7)),
                     array(-1, 6, array(1, 3, 5, 7)),
                     array(-1, 8, array(1, 3, 5, 7)));
    }

    /**
     * @dataProvider dataProvider
     * 
     * @return void
     */
    public function testChop($expected, $key, $orderedArray) {
        $karateChop = new KarateChop();
        $return = $karateChop->chop($key, $orderedArray);
        $this->assertEquals($expected, $return);
    }
}
