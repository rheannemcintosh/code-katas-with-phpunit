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
                $score += $this->rolls[$roll];
                $score += $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            if ($this->isSpare($roll)) {
                $score += $this->defaultFrameScore($roll);
                $score += $this->spareBonus($roll);

                $roll += 2;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            $roll += 2;
        }

        return $score;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] === 10;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * @param int $roll
     * @return mixed
     */
    public function defaultFrameScore(int $roll): int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param int $roll
     * @return mixed
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * @param int $roll
     * @return mixed
     */
    protected function spareBonus(int $roll): int
    {
        return $this->rolls[$roll + 2];
    }
}