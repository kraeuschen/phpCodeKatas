<?php

use phpCodeKatas\RomanNumbers;

/**
 * RomanNumbersTest
 *
 * Unittests for the Roman Numerals Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class RomanNumbersTest extends PHPUnit_Framework_TestCase
{
    private $_dataProvider = array(array(0, ''),
                                   array(1, 'I'),
                                   array(2, 'II'),
                                   array(3, 'III'),
                                   array(4, 'IV'),
                                   array(5, 'V'),
                                   array(6, 'VI'),
                                   array(7, 'VII'),
                                   array(8, 'VIII'),
                                   array(9, 'IX'),
                                   array(10, 'X'),
                                   array(11, 'XI'),
                                   array(12, 'XII'),
                                   array(13, 'XIII'),
                                   array(14, 'XIV'),
                                   array(15, 'XV'),
                                   array(16, 'XVI'),
                                   array(17, 'XVII'),
                                   array(18, 'XVIII'),
                                   array(19, 'XIX'),
                                   array(20, 'XX'),
                                   array(24, 'XXIV'),
                                   array(25, 'XXV'),
                                   array(40, 'XL'),
                                   array(50, 'L'),
                                   array(90, 'XC'),
                                   array(100, 'C'),
                                   array(400, 'CD'),
                                   array(448, 'CDXLVIII'),
                                   array(500, 'D'),
                                   array(900, 'CM'),
                                   array(1000, 'M'),
                                   array(2012, 'MMXII'),
                                   array(2499, 'MMCDXCIX'),
                                   array(3949, 'MMMCMXLIX'));

    /**
     * data provider
     * 
     * @return array
     */
    public function dataProvider()
    {
        return $this->_dataProvider;
    }

    /**
     * @dataProvider dataProvider
     * 
     * @return void
     */
    public function testArabicToRomanTranslation($int, $roman){
        $this->assertEquals($roman, RomanNumbers::convertToRoman($int));
    }
}
