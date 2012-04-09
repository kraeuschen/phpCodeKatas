<?php

// +----------------------------------------------------------+
// | phpCodeKatas FizzBuzz                                    |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * FizzBuzz
 *
 * "Write a program that prints the numbers from 1 to 100.
 * But for multiples of three print 'Fizz' instead of the number
 * and for the multiples of five print 'Buzz'.
 * 
 * For numbers which are multiples of both three and five print 'FizzBuzz'."
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codingdojo.org/cgi-bin/wiki.pl?KataFizzBuzz
 */
class FizzBuzz
{
    /**
     * Return the output
     * 
     * @param int $start
     * @param int $end
     * 
     * @return string
     */
    public function getString($start, $end) {
        $list = array();
        for ($i=$start; $i<=$end; $i++) {
            array_push($list, $this->getTextForNumber($i));
        }
        return implode(" ", $list);
    }

    /**
     * Returns the value of an int
     * 
     * @param int $number
     * 
     * @return string
     */
    public function getTextForNumber($number)
    {
        if ($this->isDivisibleByFive($number) && $this->isDivisibleByThree($number)) {
            return 'FizzBuzz';
        }

        if ($this->isDivisibleByThree($number)) {
            return 'Fizz';
        }

        if ($this->isDivisibleByFive($number)) {
            return 'Buzz';
        }
        
        return (string) $number;
    }

    /**
     * checks if number is multiplicator of 5
     * 
     * @param int $number
     * 
     * @return bool
     */
    public function isDivisibleByFive($number)
    {
        return ($number % 5 == 0);
    }

    /**
     * checks if number is multiplicator of 3
     * 
     * @param int $number
     * 
     * @return bool
     */
    public function isDivisibleByThree($number)
    {
        return ($number % 3 == 0);
    }
}
