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
}
