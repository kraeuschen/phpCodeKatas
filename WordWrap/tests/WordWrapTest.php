<?php

use phpCodeKatas\WordWrap;

/**
 * WordWrapTest
 *
 * Unittests for the Word Wrap Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class WordWrapTest extends PHPUnit_Framework_TestCase
{
    /**
     * empty string given
     *
     * @return void
     */
    public function testEmptyString()
    {
        $this->assertEquals("", WordWrap::wrap(''));
    }

    /**
     * string without limit given
     *
     * @return void
     */
    public function testString()
    {
        $this->assertEquals("word", WordWrap::wrap('word'));
    }

    /**
     * string is shorter then limit
     *
     * @return void
     */
    public function testStringShorterThenLimit()
    {
        $this->assertEquals("word", WordWrap::wrap('word', 10));
    }

    /**
     * string should wrap once
     *
     * @return void
     */
    public function testStringOnce()
    {
        $this->assertEquals("wo\nrd", WordWrap::wrap('word', 2));
    }

    /**
     * string should wrap twice
     *
     * @return void
     */
    public function testStringTwice()
    {
        $this->assertEquals("wor\ndwo\nrd", WordWrap::wrap('wordword', 3));
    }

    /**
     * blank line between words, so this should be wrapped
     *
     * @return void
     */
    public function testTwoStrings()
    {
        $this->assertEquals("word\nword", WordWrap::wrap('word word', 5));
    }

    /**
     * string with two word, but small limit, should wrap three times
     *
     * @return void
     */
    public function testWrapTwoWordsThreeTimes()
    {
        $this->assertEquals("wor\nd\nwor\nd", WordWrap::wrap("word word", 3));
    }

    /**
     * string with wrap in the middle of two words
     *
     * @return void
     */
    public function testWrapTwoWordsInTheMiddle()
    {
        $this->assertEquals("word\nword", WordWrap::wrap("word word", 4));
    }

    /**
     * should return three wrapped word
     *
     * @return void
     */
    public function testWrapThreeWords()
    {
        $this->assertEquals("word\nword\nword", WordWrap::wrap("word word word", 6));
    }

    /**
     * multiple blank lines should wrap on the last blank line only
     *
     * @return void
     */
    public function testWrapThreeWordsAtSecondBreak()
    {
        $this->assertEquals("word word\nword", WordWrap::wrap("word word word", 11));
    }
}
