<?php

// +----------------------------------------------------------+
// | phpCodeKatas KarateChop                                  |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * KarateChop
 *
 * "A binary chop (sometimes called the more prosaic binary search) finds the position of value in a
 *  sorted array of values."
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codekata.pragprog.com/2007/01/kata_two_karate.html#more
 * @see http://en.wikipedia.org/wiki/Binary_search_algorithm
 */
class KarateChop
{
    /**
     * binary search for the key
     * 
     * @param int   $key
     * @param array $array
     * 
     * @return int
     */
    public function chop($key, array $array)
    {
        if (!is_array($array) || empty($array)) {
            return -1;
        }

        return $this->_searchItem($key, $array, 0, count($array)-1);
    }
    
    /**
     * searches the key index recursivly
     * 
     * @param int   $key
     * @param array $array
     * @param int   $min
     * @param int   $max
     * 
     * @return int
     */
    protected function _searchItem($key, array $array, $min, $max)
    {
        if ($min > $max) {
            return -1;
        }

        $middle = round($min + (($max - $min) / 2));

        if ($key > $array[$middle]) {
            return $this->_searchItem($key, $array, $middle + 1, $max);
        }

        if ($key < $array[$middle]) {
            return $this->_searchItem($key, $array, $min, $middle - 1);
        }

        return $middle;
    }
}
