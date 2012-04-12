<?php

// +----------------------------------------------------------+
// | phpCodeKatas NumberToLCD                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * NumberToLCD.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 */
class NumberToLCD
{
    /**
     * LCD Segments
     * 
     * @var array
     */
    protected $segments = array("blank"  => "   ",
                                "left"   => "|  ",
                                "right"  => "  |",
                                "middle" => " - ",
                                "both"   => "| |");

   protected $lines = array("1" => array("blank", "right", "blank", "right", "blank"),
                            "2" => array("middle", "right", "middle", "left", "middle"),
                            "3" => array("middle", "right", "middle", "right", "middle"),
                            "4" => array("blank", "both", "middle", "right", "blank"),
                            "5" => array("middle", "left", "middle", "right", "middle"),
                            "6" => array("middle", "left", "middle", "both", "middle"),
                            "7" => array("middle", "right", "blank", "right", "blank"),
                            "8" => array("middle", "both", "middle", "both", "middle"),
                            "9" => array("middle", "both", "middle", "right", "middle"),
                            "0" => array("middle", "both", "blank", "both", "middle"));

    /**
     * converts a int to a lcd display string
     * 
     * @param int $number
     * 
     * @return string
     */
    public function convert($number)
    {
        $lcd = '';
        $digits = $this->_getDigits((int)$number);

        foreach ($digits as $line) {
            $lcd .= $this->_getLCD($line);
        }
        return $lcd;
    }

    /**
     * line to lcd string
     * 
     * @param array $line
     * 
     * @return string
     */
    protected function _getLCD(array $line)
    {
        $lcd = '';

        foreach ($line as $segment) {
            $lcd .= $this->segments[$segment] . "\n";
        }

        return $lcd;
    }

    /**
     * splits number to single digits
     * 
     * @param int $number
     * 
     * @return array();
     */
    protected function _getDigits($number)
    {
        $numbers = str_split($number);

        $digits = array();

        foreach ($numbers as $i) {
            array_push($digits, $this->lines[$i]);
        }

        return $digits;
    }
}
