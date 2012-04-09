<?php

// +----------------------------------------------------------+
// | phpCodeKatas StringCalculator                            |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * StringCalculator.class.php
 *
 * "Create a simple String calculator with a method int Add(string numbers)
 * The method can take 0, 1 or 2 numbers, and will return their sum (for an empty string it will return 0) for
 * example "" or "1" or "1,2"
 * 
 * Start with the simplest test case of an empty string and move to 1 and two numbers
 * Remember to solve things as simply as possible so that you force yourself to write tests you did not think about
 * Remember to refactor after each passing test
 * 
 * Allow the Add method to handle an unknown amount of numbers
 * Allow the Add method to handle new lines between numbers (instead of commas).
 * 
 * the following input is ok:  "1\n2,3"  (will equal 6)
 * the following input is NOT ok:  "1,\n" (not need to prove it - just clarifying)
 * 
 * Support different delimiters
 * to change a delimiter, the beginning of the string will contain a separate line that looks like this:
 * "/[delimiter]\n[numbers…]" for example "//;\n1;2" should return three where the default delimiter is ';'.
 * the first line is optional. all existing scenarios should still be supported
 * 
 * Calling Add with a negative number will throw an exception "negatives not allowed" - and the negative that was passed.
 * if there are multiple negatives, show all of them in the exception message"
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
