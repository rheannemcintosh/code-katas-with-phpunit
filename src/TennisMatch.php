<?php

namespace App;

class TennisMatch
{
    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;

    public function score()
    {
        if($this->playerOnePoints > 3 && $this->playerOnePoints >= $this->playerTwoPoints +2) {
            return 'Winner: Player 1';
        }

        if($this->playerTwoPoints > 3 && $this->playerTwoPoints >= $this->playerOnePoints +2) {
            return 'Winner: Player 2';
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
