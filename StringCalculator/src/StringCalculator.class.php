<?php

// +----------------------------------------------------------+
// | phpCodeKatas StringCalculator                            |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * StringCalculator.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://osherove.com/tdd-kata-1/
 */
class StringCalculator
{
    /**
     * stores negative numbers
     * 
     * @var array $negativeNumbers
     */
    private $negativeNumbers = array();

    /**
     * Add strings
     * 
     * @param string $numbers
     * 
     * @throws \InvalidArgumentException
     * @return int
     */
    public function add($numbers) {
        $numbers = $this->_fixDelimiter($numbers);
        $numbers = explode(',', $numbers);

        $result = 0;

        foreach ($numbers as $number) {
            $result += $this->_toInt($number);
        }

        $this->_isValid();

        return $result;
    }

    /**
     * Checks if an number is valid and cast it to int
     * 
     * @param string $number
     * 
     * @return int
     */
    protected function _toInt($number) {
        $number = (int) $number;

        if ($number < 0) {
            array_push($this->negativeNumbers, $number);
            $number = 0;
        }

        return $number;
    }

    /**
     * check, if negative number was set
     * 
     * @throws \InvalidArgumentException
     * @return void
     */
    protected function _isValid()
    {
        if (!empty($this->negativeNumbers)) {
            throw new \InvalidArgumentException(
                sprintf('negatives not allowed: %s', implode(', ', $this->negativeNumbers)));
        }
    }

    /**
     * Gets Delimiter and replaces content
     * 
     * @param string $numbers
     * 
     * @param string $numbers
     */
    protected function _fixDelimiter($numbers)
    {
        $delimiter = strpos($numbers, "//");

        if ($delimiter === 0) {
            $delimiter = substr($numbers, 2, 1);
            $numbers = substr($numbers, 3);
        }

        return str_replace(array("\n", $delimiter), ',', $numbers);
    }
}
