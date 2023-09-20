<?php

namespace App;

class TennisMatch
{
    protected Player $playerOne;
    protected Player $playerTwo;

    /**
     * @param $playerOne
     * @param $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->pointsToScore($this->playerOne->points),
            $this->pointsToScore($this->playerTwo->points)
        );
    }

    protected function hasWinner()
    {
        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }

        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne : $this->playerTwo;
    }

    protected function isDeuce()
    {
        return $this->canBeWon() && $this->playerOne->points === $this->playerTwo->points;
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
        if(! $this->canBeWon()) {
            return false;
        }

        return ! $this->isDeuce();
    }

    protected function canBeWon()
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}
