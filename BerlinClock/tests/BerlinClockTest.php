<?php

use phpCodeKatas\BerlinClock;

/**
 * BerlinClockTest
 *
 * Unittests for the BerlinClock Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class BerlinClockTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function dataProviderForSeconds()
    {
        return array(array('00:00:00', "Y\nOOOO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('00:00:01', "O\nOOOO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('00:00:02', "Y\nOOOO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('00:00:03', "O\nOOOO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('00:00:04', "Y\nOOOO\nOOOO\nOOOOOOOOOOO\nOOOO"));
    }

    /**
     * @return array
     */
    public function dataProviderForHours()
    {
        return array(array('00:00:00', "Y\nOOOO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('05:00:00', "Y\nROOO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('10:00:00', "Y\nRROO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('15:00:00', "Y\nRRRO\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('20:00:00', "Y\nRRRR\nOOOO\nOOOOOOOOOOO\nOOOO"),
                     array('07:00:00', "Y\nROOO\nRROO\nOOOOOOOOOOO\nOOOO"),
                     array('12:00:00', "Y\nRROO\nRROO\nOOOOOOOOOOO\nOOOO"),
                     array('18:00:00', "Y\nRRRO\nRRRO\nOOOOOOOOOOO\nOOOO"),
                     array('23:00:00', "Y\nRRRR\nRRRO\nOOOOOOOOOOO\nOOOO"));
    }

    /**
     * @return array
     */
    public function dataProviderForMinutes()
    {
        return array(array('00:01:00', "Y\nOOOO\nOOOO\nOOOOOOOOOOO\nYOOO"),
                     array('00:02:00', "Y\nOOOO\nOOOO\nOOOOOOOOOOO\nYYOO"),
                     array('00:10:00', "Y\nOOOO\nOOOO\nYYOOOOOOOOO\nOOOO"),
                     array('00:14:00', "Y\nOOOO\nOOOO\nYYOOOOOOOOO\nYYYY"),
                     array('00:20:00', "Y\nOOOO\nOOOO\nYYRYOOOOOOO\nOOOO"),
                     array('00:30:00', "Y\nOOOO\nOOOO\nYYRYYROOOOO\nOOOO"),
                     array('00:45:00', "Y\nOOOO\nOOOO\nYYRYYRYYROO\nOOOO"),
                     array('00:51:00', "Y\nOOOO\nOOOO\nYYRYYRYYRYO\nYOOO"),
                     array('00:59:00', "Y\nOOOO\nOOOO\nYYRYYRYYRYY\nYYYY"));
    }

    /**
     * @return array
     */
    public function dataProviderMiscTimes()
    {
      return array(array('13:17:01', "O\nRROO\nRRRO\nYYROOOOOOOO\nYYOO"),
                   array('23:59:59', "O\nRRRR\nRRRO\nYYRYYRYYRYY\nYYYY"),
                   array('04:47:12', "Y\nOOOO\nRRRR\nYYRYYRYYROO\nYYOO"));
    }

    /**
     * @return array
     */
    public function dataProviderWrongTimeFormats()
    {
      return array(array('33:17:01'),
                   array('23:59:61'),
                   array('04:63:12'),
                   array('foobar'),
                   array('04:23'));
    }

    /**
     * @dataProvider dataProviderForSeconds
     * 
     * @return void
     */
    public function testSecondsLamp($time, $expected)
    {
        $berlinClock = new BerlinClock();
        $this->assertEquals($expected, $berlinClock->transformTime($time));
    }

    /**
     * @dataProvider dataProviderForHours
     * 
     * @return void
     */
    public function testHoursLamps($time, $expected)
    {
        $berlinClock = new BerlinClock();
        $this->assertEquals($expected, $berlinClock->transformTime($time));
    }

    /**
     * @dataProvider dataProviderForMinutes
     * 
     * @return void
     */
    public function testMinutesLamps($time, $expected)
    {
        $berlinClock = new BerlinClock();
        $this->assertEquals($expected, $berlinClock->transformTime($time));
    }

    /**
     * @dataProvider dataProviderMiscTimes
     * 
     * @return void
     */
    public function testTransformTime($time, $expected)
    {
        $berlinClock = new BerlinClock();
        $this->assertEquals($expected, $berlinClock->transformTime($time));
    }

    /**
     * @dataProvider dataProviderWrongTimeFormats
     * 
     * @return void
     */
    public function testTransformTimeException($time)
    {
        $this->setExpectedException('InvalidArgumentException', 'invalid time format: use dd:mm:ss');

        $berlinClock = new BerlinClock();
        $berlinClock->transformTime($time);
    }
}
