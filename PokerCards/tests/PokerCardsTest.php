<?php

use phpCodeKatas\PokerCards;

/**
 * PokerCardsTest
 *
 * Unittests for the Poker Cards Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class PokerCardsTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test for white hand wins with highcard
     *
     * @return void
     */
    public function testWhiteHandWinsWithHighcard()
    {
        $expected = 'White wins - high card: Ace';

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand('2H', '3D', '5S', '9C', 'KD');
        $pokerCards->setWhiteHand('2C', '3H', '4S', '8C', 'AH');
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for black hand wins with highcard
     *
     * @return void
     */
    public function testBlackHandWinsWithHighcard()
    {
        $expected = 'Black wins - high card: Ace';

        $pokerCards = new PokerCards();
        $pokerCards->setWhiteHand('2H', '3D', '5S', '9C', 'KD');
        $pokerCards->setBlackHand('2C', '3H', '4S', '8C', 'AH');
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for black hand full house
     *
     * @return void
     */
    public function testBlackHandWinsWithFullHouse()
    {
        $this->markTestIncomplete();
        $expected = 'Black wins - full house';

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand('2H', '4S', '4C', '2D', '4H');
        $pokerCards->setWhiteHand('2S', '8S', 'AS', 'QS', '3S');
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }
}
