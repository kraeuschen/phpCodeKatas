<?php

// +----------------------------------------------------------+
// | phpCodeKatas Poker Cards                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * PokerCards.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 */
class PokerCards
{
    /**
     * black hand
     *
     * @array
     */
    protected $_blackHand = array();

    /**
     * white hand
     *
     * @array
     */
    protected $_whiteHand = array();

    /**
     * sets black hand cards
     *
     * @param array $cards
     *
     * @return void
     */
    public function setBlackHand(array $cards)
    {
        if (count($cards) !== 5) {
            throw new \InvalidArgumentException('invalid card amount for black hand');
        }

        $this->_blackHand = $cards;
    }

    /**
     * sets white hand cards
     *
     * @param array $cards
     *
     * @return void
     */
    public function setWhiteHand(array $cards)
    {
        if (count($cards) !== 5) {
            throw new \InvalidArgumentException('invalid card amount for white hand');
        }

        $this->_whiteHand = $cards;
    }

    /**
     * returns winner as string
     *
     * @return string
     */
    public function getWinner()
    {
        if (in_array('AH', $this->_whiteHand)) {
            return 'White';
        } else {
            return 'Black';
        }
    }

    /**
     * returns result
     *
     * @return string
     */
    public function getResult()
    {
        $winner = $this->getWinner();
        return sprintf("%s wins - high card: Ace", $winner);
    }
}
