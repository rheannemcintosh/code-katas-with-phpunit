<?php

namespace App;

class BowlingGame
{
    const FRAMES_PER_GAME = 10;
    protected array $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            // Check for a Spare
            if($this->rolls[$roll] + $this->rolls[$roll + 1] === 10) {
                // You got a spare
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
                $score += $this->rolls[$roll + 2];

                    $roll += 2;
            } else {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];

                $roll += 2;
            }
        }

        return $score;
    }
}