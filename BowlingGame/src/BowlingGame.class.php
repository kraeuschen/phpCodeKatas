<?php

// +----------------------------------------------------------+
// | phpCodeKatas Bowling Game                                |
// +----------------------------------------------------------+

namespace phpCodeKatas;

use \SplFixedArray;

/**
 * BowlingGame.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata
 */
class BowlingGame {

    /**
     * current index
     *
     * @var int
     */
    private $currentRoll = 0;

    /**
     * logging of all rolls
     *
     * @var SplFixedArray
     */
    private $rolls = null;

    /**
     * constructor
     *
     * @return void
     */
    public function __construct() {
        $this->rolls = new SplFixedArray(21);
    }

    /**
     * player bowls
     *
     * @param int $pins
     *
     * @return void
     */
    public function roll($pins) {
        $this->score += $pins;
        $this->rolls[$this->currentRoll++] = $pins;
    }

    /**
     * calculates and returns the current score
     *
     * @return int
     */
    public function score() {
        $score = 0;
        $frameIndex = 0;

        for ($frame=0; $frame<10; $frame++) {
            if ($this->_isStrike($frameIndex)) {
                $score += 10 + $this->_strikeBonus($frameIndex);
                $frameIndex += 1;
            } elseif ($this->_isSpare($frameIndex)) {
                $score += 10 + $this->_spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->_sumOfBalls($frameIndex);
                $frameIndex += 2;
            }
        }

        return $score;
    }

    /**
     * caculates the scores in a frame withou bonus
     *
     * @param int $frameIndex
     *
     * @return int
     */
    private function _sumOfBalls($frameIndex) {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex+1];
    }

    /**
     * calculates strike bonus of a frame
     *
     * @param int $frameIndex
     *
     * @return int
     */
    private function _strikeBonus($frameIndex) {
        return $this->rolls[$frameIndex+1] + $this->rolls[$frameIndex+2];
    }

    /**
     * calculates spare bonus of a frame
     *
     * @param int $frameIndex
     *
     * @return int
     */
    private function _spareBonus($frameIndex) {
        return $this->rolls[$frameIndex+2];
    }

    /**
     * checks for an strike in current frame
     *
     * @param int $frameIndex
     *
     * @return bool
     */
    private function _isStrike($frameIndex) {
        return ($this->rolls[$frameIndex] == 10);
    }

    /**
     * checks for an spare in current frame
     *
     * @param int $frameIndex
     *
     * @return bool
     */
    private function _isSpare($frameIndex) {
        return (($this->rolls[$frameIndex] + $this->rolls[$frameIndex+1]) == 10);
    }
}
