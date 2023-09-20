<?php

namespace App;

class TennisMatch
{
    /** @var Player  */
    protected Player $playerOne;

    /** @var Player */
    protected Player $playerTwo;

    /**
     * Create a new Tennis Match.
     *
     * @param $playerOne
     * @param $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    /**
     * Score the match.
     *
     * @return string
     */
    public function score(): string
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

    /**
     * Determine if there is a winner.
     * 
     * @return bool
     */
    protected function hasWinner(): bool
    {
        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }

        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    /**
     * Get the current leader of the set.
     * 
     * @return Player
     */
    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne : $this->playerTwo;
    }

    /**
     * Determine if the players are in deuce.
     * 
     * @return bool
     */
    protected function isDeuce(): bool
    {
        return $this->hasReachedDeuceThreshold() && $this->playerOne->points === $this->playerTwo->points;
    }

    /**
     * Convert the player's score to the Tennis term.
     *
     * @param $points
     * @return string
     */
    protected function pointsToScore($points): string
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

    /**
     * Determine if one player has the advantage.
     * 
     * @return bool
     */
    protected function hasAdvantage(): bool
    {
        if(! $this->hasReachedDeuceThreshold()) {
            return false;
        }

        return ! $this->isDeuce();
    }

    protected function hasReachedDeuceThreshold()
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}
