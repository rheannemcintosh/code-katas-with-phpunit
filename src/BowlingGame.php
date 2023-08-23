<?php

namespace App;

class BowlingGame
{
    /**
     * The number of frames in a game
     */
    const FRAMES_PER_GAME = 10;

    /**
     * All rolls for the game.
     *
     * @var array
     */
    protected array $rolls = [];

    /**
     * Roll the bowling ball.
     *
     * @param int $pins
     * @return void
     */
    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    /**
     * Calculate the final score
     *
     * @return int
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->rolls[$roll] + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * Determine if the current roll was a strike.
     *
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] === 10;
    }

    /**
     * Determine if the current frame was a spare.
     *
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * Calculate the score for the frame.
     *
     * @param int $roll
     * @return int
     */
    public function defaultFrameScore(int $roll): int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * Get the bonus for a strike.
     *
     * @param int $roll
     * @return int
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->defaultFrameScore($roll + 1);
    }

    /**
     * Get the bonus for a spare.
     *
     * @param int $roll
     * @return int
     */
    protected function spareBonus(int $roll): int
    {
        return $this->rolls[$roll + 2];
    }
}
