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
    public function testWhiteHandWinsWithHighcardAce()
    {
        $expected = 'White wins - high card: Ace';

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand(array('2H', '3D', '5S', '9C', 'KD'));
        $pokerCards->setWhiteHand(array('2C', '3H', '4S', '8C', 'AH'));
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for black hand wins with highcard
     *
     * @return void
     */
    public function testBlackHandWinsWithHighcardAce()
    {
        $expected = 'Black wins - high card: Ace';

        $pokerCards = new PokerCards();
        $pokerCards->setWhiteHand(array('2H', '3D', '5S', '9C', 'KD'));
        $pokerCards->setBlackHand(array('2C', '3H', '4S', '8C', 'AH'));
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for black hand wins with highcard
     *
     * @return void
     */
    public function testWhiteHandWinsWithHighcardKing()
    {
        $expected = 'White wins - high card: King';

        $pokerCards = new PokerCards();
        $pokerCards->setWhiteHand(array('2H', '3D', '5S', '9C', 'KD'));
        $pokerCards->setBlackHand(array('2C', '3H', '4S', '8C', '6C'));
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for invalid amount of cards
     *
     * @return void
     */
    public function testInvalidCardAmountOfWhiteHandException()
    {
        $this->setExpectedException('InvalidArgumentException', 'invalid card amount for white hand');

        $pokerCards = new PokerCards();
        $pokerCards->setWhiteHand(array('3D', '5S', '9C', 'KD'));
    }

    /**
     * Test for invalid amount of cards
     *
     * @return void
     */
    public function testInvalidCardAmountOfBlackHandException()
    {
        $this->setExpectedException('InvalidArgumentException', 'invalid card amount for black hand');

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand(array('3D', '5S', '9C', 'KD', 'AH', 'JD'));
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
