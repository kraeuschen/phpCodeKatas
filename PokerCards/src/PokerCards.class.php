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
     * caches highest card
     *
     * @var string
     */
    protected $_highestCard = null;

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
        if (in_array($this->_highestCard, $this->_whiteHand)) {
            return 'White';
        } else {
            return 'Black';
        }
    }

    /**
     * gets the highest card of the deck
     *
     * @return void
     */
    public function setHighestCard()
    {
        $highestValue = 0;
        $highestCardName = '';

        // white hand
        foreach ($this->_whiteHand as $card) {
            list($cardName, $colour) = str_split($card);

            $currentValue = $this->_cardValueMapper[$cardName];

            if ($currentValue > $highestValue) {
                $highestCardName = $cardName;
                $highestValue = $currentValue;
                $this->_highestCard = $card;
            }
        }

        // black hand
        foreach ($this->_blackHand as $card) {
            list($cardName, $colour) = str_split($card);

            $currentValue = $this->_cardValueMapper[$cardName];

            if ($currentValue > $highestValue) {
                $highestCardName = $cardName;
                $highestValue = $currentValue;
                $this->_highestCard = $card;
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
        $this->setHighestCard();

        $winner = $this->getWinner();

        list($cardName, $colour) = str_split($this->_highestCard);

        return sprintf("%s wins - high card: %s",
                       $winner,
                       $this->_cardNameMapper[$cardName]);
    }
}
