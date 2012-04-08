<?php

// +----------------------------------------------------------+
// | phpCodeKatas BerlinClock                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * BerlinClock
 *
 * "Create a representation of the Berlin Clock for a given time (hh::mm:ss).
 * 
 * On the top of the clock there is a yellow lamp that blinks on/off every two seconds.
 * 
 * The top two rows of lamps are red. These indicate the hours of a day. In the top row there are 4 red lamps.
 * Every lamp represents 5 hours. In the lower row of red lamps every lamp represents 1 hour.
 * So if two lamps of the first row and three of the second row are switched on that indicates 5+5+3=13h or 1 pm.
 * 
 * The two rows of lamps at the bottom count the minutes. The first of these rows has 11 lamps, the second 4.
 * In the first row every lamp represents 5 minutes. In this first row the 3rd, 6th and 9th lamp are red and indicate
 * the first quarter, half and last quarter of an hour. The other lamps are yellow.
 * 
 * In the last row with 4 lamps every lamp represents 1 minute."
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://content.codersdojo.org/code-kata-catalogue/berlin-clock/
 */
class BerlinClock
{
    /**
     * transforms a time to the berlin clock format
     * 
     * @param string $time
     * 
     * @return string
     */
    public function transformTime($time)
    {
        $this->_validateTime($time);

        list($hours, $minutes, $seconds) = split(':', $time);

        $secondsLamp      = $this->_getSecondsLamp((int) $seconds); 
        $fiveHoursLamps   = $this->_getFiveHoursLamps((int) $hours);
        $oneHourLamps     = $this->_getOneHoursLamps((int) $hours);
        $fiveMinutesLamps = $this->_getFiveMinutesLamps((int) $minutes);
        $oneMinutesLamps  = $this->_getOneMinutesLamps((int) $minutes);
        
        return implode("\n", array($secondsLamp, $fiveHoursLamps, $oneHourLamps, $fiveMinutesLamps, $oneMinutesLamps));
    }

    /**
     * returns five minutes lamps
     * 
     * @param int $minutes
     * 
     * @return string
     */
    protected function _getFiveMinutesLamps($minutes)
    {
        $fiveMinutes = '';
        $i = 0;

        $lamps = $this->_generateLamps($minutes / 5, 11);

        foreach ($lamps as $lamp) {
            $fiveMinutes .= $this->_getFiveMinutesLampColor(++$i, $lamp);
        }
        return $fiveMinutes;
    }

    /**
     * extracted method. which returns the color state auf five minutes row
     * 
     * @param int $index
     * @param int $state
     * 
     * @return string
     */
    private function _getFiveMinutesLampColor($index, $state) {
        if ($state == 1 && ($index % 3 == 0)) {
            return 'R';
        }
        elseif ($state == 1) {
            return 'Y';
        } else {
            return 'O';
        }
    }

    /**
     * returns one minutes lamps
     * 
     * @param int $minutes
     * 
     * @return string
     */
    protected function _getOneMinutesLamps($minutes)
    {
        $lamps = $this->_generateLamps($minutes % 5, 4);
        return str_replace(array(1,0), array('Y','O'), implode('', $lamps));
    }

    /**
     * returns the one hours lamps
     * 
     * @param int $hours
     * 
     * @return string
     */
    protected function _getOneHoursLamps($hours)
    {
        $lamps = $this->_generateLamps($hours % 5, 4);
        return str_replace(array(1,0), array('R','O'), implode('', $lamps));
    }

    /**
     * returns the five hours lamps
     * 
     * @param int $hours
     * 
     * @return string
     */
    protected function _getFiveHoursLamps($hours)
    {
        $lamps = $this->_generateLamps($hours / 5, 4);
        return str_replace(array(1,0), array('R','O'), implode('', $lamps));
    }

    /**
     * uses R as on, = as off
     * 
     * @param int $iterator
     * @param int $length
     * 
     * @return array
     */
    protected function _generateLamps($iterator, $length)
    {
        $lamps = array();

        for ($i=1; $i<=$length; $i++) {
            $state = ($iterator >= $i) ? 1 : 0;
            array_push($lamps, $state);
        }
        return $lamps;
    }

    /**
     * returns the seconds lamp
     * 
     * @param int $seconds
     * 
     * @return string
     */
    protected function _getSecondsLamp($seconds)
    {
        return ($seconds % 2 == 0) ? 'Y' : 'O';
    }

    /**
     * checks the input
     * 
     * @param string $time
     * 
     * @throws \InvalidArgumentException
     * 
     * @return void
     */
    protected function _validateTime($time)
    {
        if(!(bool)preg_match('/^(?:2[0-3]||(([0-9]||0[0-9])||1[0-9])):[0-5][0-9]:[0-5][0-9]$/', trim($time))) {
            throw new \InvalidArgumentException('invalid time format: use dd:mm:ss');
        }
    }
}
