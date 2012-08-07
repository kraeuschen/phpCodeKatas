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
     * Test for white hand wins with highcard ace
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
     * Test for black hand wins with highcard ace
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
     * Test for white hand wins with highcard king
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
     * Test for white hand wins by pair queen
     *
     * @return void
     */
    public function testWhiteHandWinsWithPairQueen()
    {
        $expected = 'Black wins - pair: Queen';

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand(array('2H', '3D', '5S', 'QC', 'QD'));
        $pokerCards->setWhiteHand(array('2C', '3H', '4S', '8C', 'QS'));

        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for white hand wins by pair queen
     *
     * @return void
     */
    public function testWhiteHandWinsWithPairKing()
    {
        $expected = 'White wins - pair: King';

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand(array('2H', '3D', '5S', 'QC', 'QD'));
        $pokerCards->setWhiteHand(array('2C', '3H', '4S', 'KC', 'KS'));

        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }
}
