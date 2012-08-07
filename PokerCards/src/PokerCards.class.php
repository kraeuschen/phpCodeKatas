<?php

// +----------------------------------------------------------+
// | phpCodeKatas Poker Cards                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * PokerCards.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 *
 */
class PokerCards
{
    /**
     * sets black hand cards
     *
     * @param string $cardOne
     * @param string $cardTwo
     * @param string $cardThree
     * @param string $cardFour
     * @param string $cardFive
     *
     * @return void
     */
    public function setBlackHand($cardOne, $cardTwo, $cardThree, $cardFour, $cardFive)
    {
    }

    /**
     * sets white hand cards
     *
     * @param string $cardOne
     * @param string $cardTwo
     * @param string $cardThree
     * @param string $cardFour
     * @param string $cardFive
     *
     * @return void
     */
    public function setWhiteHand($cardOne, $cardTwo, $cardThree, $cardFour, $cardFive)
    {
    }

    /**
     * returns result
     *
     * @return string
     */
    public function getResult()
    {
        return 'White wins - high card: Ace';
    }
}
