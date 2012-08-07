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
        $this->_blackHand = array('cardOne'   => $cardOne,
                                  'cardTwo'   => $cardTwo,
                                  'cardThree' => $cardThree,
                                  'cardFour'  => $cardFour,
                                  'cardFive'  => $cardFive);
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
        $this->_whiteHand = array('cardOne'   => $cardOne,
                                  'cardTwo'   => $cardTwo,
                                  'cardThree' => $cardThree,
                                  'cardFour'  => $cardFour,
                                  'cardFive'  => $cardFive);
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
