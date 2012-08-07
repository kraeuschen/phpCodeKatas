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
     * Test for black hand full house
     *
     * @return void
     */
    public function testBlackHandFullHouse()
    {
        $expected = 'Black wins - full house';

        $pokerCards = new PokerCards();
        $pokerCards->setBlackHand('2H', '3D', '5S', '9C', 'KD');
        $pokerCards->setWhiteHand('2S', '8S', 'AS', 'QS', '3S');
        $result = $pokerCards->getResult();
        $this->assertEquals($expected, $result);
    }
}
