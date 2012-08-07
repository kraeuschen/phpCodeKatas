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
     * card name mapper
     *
     * @var array
     */
    protected $_cardNameMapper = array(
        'T' => '10',
        'J' => 'Jack',
        'Q' => 'Queen',
        'K' => 'King',
        'A' => 'Ace',
    );

    /**
     * card value mapper
     *
     * @var array
     */
    protected $_cardNameValueMapper = array(
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        'T' => 10,
        'J' => 11,
        'Q' => 12,
        'K' => 13,
        'A' => 14,
    );

    /**
     * card name mapper
     *
     * @var array
     */
    protected $_cardValueNameMapper = array(
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => 'T',
        11 => 'J',
        12 => 'Q',
        13 => 'K',
        14 => 'A',
    );

    /**
     * caches highest card
     *
     * @var int
     */
    protected $_highestValue = 0;

    /**
     * caches highest amount
     *
     * @var int
     */
    protected $_highestAmount = 0;

    /**
     * caches winning type
     *
     * @var string
     */
    protected $_winningType = null;

    /**
     * black hand
     *
     * @var array
     */
    protected $_blackHand = array();

    /**
     * white hand
     *
     * @array
     */
    protected $_whiteHand = array();

    /**
     * caches winner
     *
     * @var string
     */
    protected $_winner = '';

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
     * @param string $card
     *
     * @return string
     */
    public function getWinner()
    {
       return $this->_winner;
    }

    /**
     * gets the highest card of the deck
     *
     * @return void
     */
    public function setHighestHand()
    {
        $this->_highestCard = null;
        $this->_setHighestHandByPlayer('White');
        $this->_setHighestHandByPlayer('Black');
    }

    /**
     * sets highest hand by hand
     *
     * @return void
     */
    private function _setHighestHandByPlayer($type)
    {
        $cards = ($type == 'White') ? $this->_whiteHand : $this->_blackHand;

        $uniqueCards = array();

        // map cards to other array
        foreach ($cards as $card) {
            list($cardName, $color) = str_split($card);

            $currentValue = $this->_cardNameValueMapper[$cardName];

            if (!isset($uniqueCards[$currentValue])) {
                $uniqueCards[$currentValue] = 1;
            } else {
                $uniqueCards[$currentValue] += 1;
            }
        }

        // check for multiple cards of one type
        foreach ($uniqueCards as $value => $amount) {
            switch ($amount) {
                case 4:
                    $winningType = 'Four of a Kind';
                    break;
                case 3:
                    $winningType = 'Three of a Kind';
                    break;
                case 2:
                    $winningType = 'pair';
                    break;
                default :
                    $winningType = 'high card';
            }

            // same amount, but higher value
            if ($amount == $this->_highestAmount && $value > $this->_highestValue) {
                $this->_highestAmount = $amount;
                $this->_highestValue  = $value;
                $this->_winner = $type;
                $this->_winningType = $winningType;
            // only higher amout
            } else if ($amount > $this->_highestAmount) {
                $this->_highestAmount = $amount;
                $this->_highestValue  = $value;
                $this->_winner = $type;
                $this->_winningType = $winningType;
            }
        }
    }

    /**
     * returns result
     *
     * @return string
     */
    public function getResult()
    {
        $this->setHighestHand();

        $cardName = $this->_cardValueNameMapper[$this->_highestValue];

        return sprintf("%s wins - %s: %s",
                       $this->getWinner(),
                       $this->_winningType,
                       $this->_cardNameMapper[$cardName]);
    }
}
