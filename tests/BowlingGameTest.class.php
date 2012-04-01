<?php

require_once('../src/BowlingGame.class.php');

use phpCodeKatas\BowlingGame;

/**
 * BowlingGameTest
 *
 * Unittests for the Bowling Game Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    /**
     * stores the BowlingGame instance
     *
     * @var BowlingGame $game
     */
    protected $game = null;

    /**
     * inits the unittests
     *
     * @return void
     */
    protected function setUp()
    {
        $this->game = new BowlingGame();
    }

    /**
     * throws the bowl
     *
     * @param int $n
     * @param int $pins
     *
     * @return void
     */
    private function _rollPins($n, $pins)
    {
        for ($i=0; $i<$n; $i++) {
            $this->game->roll($pins);
        }
    }

    /**
     * simulates an spare
     *
     * @return void
     */
    private function _rollSpare()
    {
        $this->_rollPins(2, 5);
    }

    /**
     * absolute beginner, no score for every throw
     *
     * @return void
     */
    public function testGutterGame()
    {
        $this->_rollPins(20, 0);
        $this->assertEquals(0, $this->game->score());
    }

    /**
     * one point for every throw
     *
     * @return void
     */
    public function testAllOnes()
    {
        $this->_rollPins(20, 1);
        $this->assertEquals(20, $this->game->score());
    }

    /**
     * one spare
     *
     * @return void
     */
    public function testOneSpare()
    {
        $this->_rollSpare();
        $this->_rollPins(1, 3);
        $this->_rollPins(17, 0);
        $this->assertEquals(16, $this->game->score());
    }

    /**
     * one strike
     *
     * @return void
     */
    public function testOneStrike()
    {
        $this->_rollPins(1, 10);
        $this->_rollPins(1, 3);
        $this->_rollPins(1, 4);
        $this->_rollPins(16, 0);
        $this->assertEquals(24, $this->game->score());
    }

    /**
     * perfect game
     *
     * @return void
     */
    public function testPerfectGame()
    {
        $this->_rollPins(12, 10);
        $this->assertEquals(300, $this->game->score());
    }
}
