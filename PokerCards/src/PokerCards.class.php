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
    protected $_cardNameMapper = array(
        'T' => '10',
        'J' => 'Jack',
        'Q' => 'Queen',
        'K' => 'King',
        'A' => 'Ace',
    );

    protected $_cardValueMapper = array(
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
     * @param string $card
     *
     * @return string
     */
    public function getWinner($card)
    {
        if (in_array($card, $this->_whiteHand)) {
            return 'White';
        } else {
            return 'Black';
        }
    }

    /**
     * return highest card of the deck
     *
     * @return string
     */
    public function getHighestCard()
    {
        $highestValue = 0;
        $highestCardName = '';
        $highestCard = '';

        // white hand
        foreach ($this->_whiteHand as $card) {
            list($cardName, $colour) = str_split($card);

            $currentValue = $this->_cardValueMapper[$cardName];

            if ($currentValue > $highestValue) {
                $highestCardName = $cardName;
                $highestValue = $currentValue;
                $highestCard = $card;
            }
        }

        // black hand
        foreach ($this->_blackHand as $card) {
            list($cardName, $colour) = str_split($card);

            $currentValue = $this->_cardValueMapper[$cardName];

            if ($currentValue > $highestValue) {
                $highestCardName = $cardName;
                $highestValue = $currentValue;
                $highestCard = $card;
            }
        }

        return $highestCard;
    }

    /**
     * returns result
     *
     * @return string
     */
    public function getResult()
    {
        $card   = $this->getHighestCard();
        $winner = $this->getWinner($card);

        list($cardName, $colour) = str_split($card);

        return sprintf("%s wins - high card: %s",
                       $winner,
                       $this->_cardNameMapper[$cardName]);
    }
}
