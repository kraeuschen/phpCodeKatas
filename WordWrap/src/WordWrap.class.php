<?php

// +----------------------------------------------------------+
// | phpCodeKatas WordWrap Recursive                          |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * WordWrap.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codingdojo.org/cgi-bin/wiki.pl?KataWordWrap
 * @see http://blog.code-cop.org/2011/08/word-wrap-kata-variants.html
 * @see http://thecleancoder.blogspot.de/2010/10/craftsman-62-dark-path.html
 */
class WordWrap
{
    /**
     * new line charcode
     *
     * @var string
     */
    protected static $newLine = "\n";

    /**
     * whitespace
     *
     * @var string
     */
    protected static $whitespace = " ";

    /**
     * Wraps an string without using split
     *
     * @param string $string
     * @param int $length
     *
     * @return string
     */
    public static function wrap($string, $length = 0)
    {
        $string = trim($string);

        if (strlen($string) <= $length || $length == 0) {
            return $string;
        }

        $splitPosition = $length;

        // search the last position of blank line, in substring
        $indexWhitespace = (int) strrpos(substr($string, 0, $length), self::$whitespace);

        if ($indexWhitespace > 0) {
            $splitPosition = $indexWhitespace;
        }

        return sprintf("%s%s%s",
                       substr($string, 0, $splitPosition),
                       self::$newLine,
                       self::wrap(substr($string, $splitPosition), $length));
    }
}
