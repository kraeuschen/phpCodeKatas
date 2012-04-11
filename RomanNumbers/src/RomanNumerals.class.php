<?php

// +----------------------------------------------------------+
// | phpCodeKatas Roman Numerals                              |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * RomanNumerals.class.php
 * 
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codingdojo.org/cgi-bin/wiki.pl?KataRomanNumerals
 * @see http://langrsoft.com/jeff/2011/09/tdd-kata-roman-number-converter/
 * @see http://www.novaroma.org/via_romana/numbers.html
 */
class RomanNumerals
{
    /**
     * Int to Char Mapper
     * 
     * @var array
     */
    private static $_map = array(1000 => 'M',
                                 900  => 'CM',
                                 500  => 'D',
                                 400  => 'CD',
                                 100  => 'C',
                                 90   => 'XC',
                                 50   => 'L',
                                 40   => 'XL',
                                 10   => 'X',
                                 9    => 'IX',
                                 5    => 'V',
                                 4    => 'IV',
                                 1    => 'I');
    
    /**
     * converts int to roman
     * 
     * @param int $int
     * 
     * @return string
     */
    public static function convertToRoman($int) {
        $roman = '';
        $int = (int) $int;

        while ($int > 0) {
            foreach (self::$_map as $n => $char) {
                if ($int >= $n) {
                    $int -= $n;
                    $roman .= $char;
                    break;
                }
            }
        }
        
        return $roman;
    }
}
