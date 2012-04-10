<?php

// +----------------------------------------------------------+
// | phpCodeKatas Tennis                                      |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * Tennis.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codingdojo.org/cgi-bin/wiki.pl?KataTennis
 */
class Tennis
{
    /**
     * @var int
     */
    protected $scoresPlayerOne = 0;

    /**
     * @var int
     */
    protected $scoresPlayerTwo = 0;

    /**
     * human readable output of current game score
     * 
     * @return string
     */
    public function getGameScore()
    {
        if ($this->_hasWinner()) {
            return sprintf("%s wins", $this->_getLeadingPlayer());
        }

        if ($this->_isDeuce()) {
            return "Deuce";
        }

        if ($this->_hasAdvantage()) {
            return sprintf("Advantage %s", $this->_getLeadingPlayer());
        }

        if ($this->_scoreIsEqual()) {
            return sprintf("%s all", $this->translateScore($this->scoresPlayerOne));
        } else {
            return sprintf("%s, %s", $this->translateScore($this->scoresPlayerOne),
                                     $this->translateScore($this->scoresPlayerTwo));
        }
    }

    /**
     * @return bool
     */
    protected function _hasAdvantage()
    {
        return ($this->_onePlayerHasMoreTheForty() && $this->_onePlayerLeadsByOnePoint());
    }

    /**
     * @return string
     */
    protected function _getLeadingPlayer()
    {
        if ($this->_scoreIsEqual()) {
            return "None";
        }

        return ($this->scoresPlayerOne > $this->scoresPlayerTwo) ? 'Player 1' : 'Player 2';
    }
    
    /**
     * @return bool
     */
    protected function _isDeuce() {
        return ($this->scoresPlayerOne >= 3 && $this->_scoreIsEqual());
    }

    /**
     * @return bool
     */
    protected function _hasWinner()
    {
        return ($this->_onePlayerHasMoreTheForty() && $this->_onePlayerLeadsByTwoPoints());
    }

    /**
     * @return bool
     */
    protected function _onePlayerLeadsByTwoPoints()
    {
        return (($this->scoresPlayerOne > $this->scoresPlayerTwo+1) ||
                ($this->scoresPlayerTwo > $this->scoresPlayerOne+1));
    }

    /**
     * @return bool
     */
    protected function _onePlayerLeadsByOnePoint()
    {
        return (($this->scoresPlayerOne == $this->scoresPlayerTwo+1) ||
                ($this->scoresPlayerTwo == $this->scoresPlayerOne+1));
    }

    /**
     * @return bool
     */
    protected function _onePlayerHasMoreTheForty()
    {
        return ($this->scoresPlayerOne > 3 || $this->scoresPlayerTwo > 3);
    }

    /**
     * @return bool
     */
    protected function _scoreIsEqual()
    {
        return $this->scoresPlayerOne == $this->scoresPlayerTwo;
    }

    /**
     * int to human redable string
     * 
     * @param int $score
     * 
     * @throws \InvalidArgumentException
     * 
     * @return string
     */
    protected function translateScore($score) {
        switch ($score) {
            case 0:
                return 'Love';
            case 1:
                return 'Fifteen';
            case 2:
                return 'Thirty';
            case 3:
                return 'Forty';
            default:
                throw new \InvalidArgumentException(sprintf('no translation for score %s', $score));
        }
    }

    /**
     * @return void
     */
    public function playerTwoScores()
    {
        $this->scoresPlayerTwo++;
    }

    /**
     * @return void
     */
    public function playerOneScores()
    {
        $this->scoresPlayerOne++;
    }
}
