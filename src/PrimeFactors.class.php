<?php

// +----------------------------------------------------------+
// | phpCodeKatas PrimeFactors                                |
// +----------------------------------------------------------+

namespace phpCodeKatas;

use \ArrayObject;

/**
 * PrimeFactors.class.php
 *
 * Uncle Bobs Prime Factors Kata in PHP
 *
 * In number theory, the prime factors of a positive integer are the prime numbers that divide that integer exactly,
 * without leaving a remainder.
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://butunclebob.com/ArticleS.UncleBob.ThePrimeFactorsKata
 */
class PrimeFactors
{
    /**
     * Generates an list of prime numbers
     *
     * @param int $n
     *
     * @return ArrayObject
     */
    public static function generate($n)
    {
        $list = new ArrayObject();
        $candidate = 2;

        while ($n>1) {
            for (; $n % $candidate == 0; $n /= $candidate) {
                $list->append($candidate);
            }
            $candidate++;
        }
        return $list;
    }
}
