<?php

namespace App;

class TennisMatch
{
    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;

    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader();
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->pointsToScore($this->playerOnePoints),
            $this->pointsToScore($this->playerTwoPoints)
        );
    }

    public function pointToPlayerOne()
    {
        $this->playerOnePoints++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwoPoints++;
    }

    protected function hasWinner()
    {
        if($this->playerOnePoints > 3 && $this->playerOnePoints >= $this->playerTwoPoints +2) {
            return true;
        }

        if($this->playerTwoPoints > 3 && $this->playerTwoPoints >= $this->playerOnePoints +2) {
            return true;
        }

        return false;
    }



    protected function leader(): string
    {
        return $this->playerOnePoints > $this->playerTwoPoints ? 'Player 1' : 'Player 2';
    }

    protected function isDeuce()
    {
        return $this->canBeWon() && $this->playerOnePoints === $this->playerTwoPoints;
    }

    protected function pointsToScore($points)
    {
        switch ($points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }

    protected function hasAdvantage()
    {
        if ($this->canBeWon() && $this->playerOnePoints > $this->playerTwoPoints) {
            return true;
        }

        if ($this->canBeWon() && $this->playerTwoPoints > $this->playerOnePoints) {
            return true;
        }

        return false;
    }

    protected function canBeWon()
    {
        return $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
    }
}
