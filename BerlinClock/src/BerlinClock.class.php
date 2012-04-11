<?php

// +----------------------------------------------------------+
// | phpCodeKatas BerlinClock                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * BerlinClock.class.php
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
