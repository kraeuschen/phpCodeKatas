<?php

require_once('../src/Tennis.class.php');

use phpCodeKatas\Tennis;

/**
 * TennisTest
 *
 * Unittests for the Tennis Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class TennisTest extends PHPUnit_Framework_TestCase
{
    /**
     * data provider
     * 
     * @return array
     */
    public function dataProvider()
    {
        return array(array(1, 0, "Fifteen, Love"),
                     array(1, 1, "Fifteen all"),
                     array(3, 2, "Forty, Thirty"),
                     array(3, 3, "Deuce"),
                     array(4, 0, "Player 1 wins"),
                     array(2, 4, "Player 2 wins"),
                     array(5, 4, "Advantage Player 1"),
                     array(4, 5, "Advantage Player 2"),
                     array(4, 6, "Player 2 wins"),
                     array(6, 5, "Advantage Player 1"),
                     array(6, 6, "Deuce"),
                     array(7, 5, "Player 1 wins"),
                     array(10, 5, "Player 1 wins"));
    }

    /**
     * @return void
     */
    public function testNewGame()
    {
        $tennis = new Tennis();
        $result = $tennis->getGameScore();
        $this->assertEquals("Love all", $result);
    }

    /**
     * @return void
     */
    public function testPlayerOneScores()
    {
        $tennis = new Tennis();
        $tennis->playerOneScores();

        $result = $tennis->getGameScore();
        $this->assertEquals("Fifteen, Love", $result);
    }

    /**
     * @return void
     */
    public function testPlayerTwoScores()
    {
        $tennis = new Tennis();
        $tennis->playerTwoScores();

        $result = $tennis->getGameScore();
        $this->assertEquals("Love, Fifteen", $result);
    }

    /**
     * @return void
     */
    public function testFifteenAll()
    {
        $tennis = new Tennis();
        $tennis->playerTwoScores();
        $tennis->playerOneScores();

        $result = $tennis->getGameScore();
        $this->assertEquals("Fifteen all", $result);
    }

    /**
     * @return void
     */
    public function testPlayerTwoScoresTwoTimes() {
        $tennis = new Tennis();
        $tennis->playerTwoScores();
        $tennis->playerTwoScores();

        $result = $tennis->getGameScore();
        $this->assertEquals("Love, Thirty", $result);
    }

    /**
     * @dataProvider dataProvider
     * 
     * @return void
     */
    public function testTheGame($pointsPlayerOne, $pointsPlayerTwo, $expected) {
        $tennis = new Tennis();

        for ($i=1; $i<=$pointsPlayerOne; $i++) {
            $tennis->playerOneScores();
        }

        for ($i=1; $i<=$pointsPlayerTwo; $i++) {
            $tennis->playerTwoScores();
        }

        $result = $tennis->getGameScore();
        $this->assertEquals($expected, $result);
    }
}
