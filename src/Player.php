<?php

namespace App;

class Player
{
    /** @var string  */
    public string $name;

    /** @var int  */
    public int $points = 0;

    /**
     * Create a new player.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Add a point for the player.
     */
    public function score()
    {
        $this->points++;
    }
}