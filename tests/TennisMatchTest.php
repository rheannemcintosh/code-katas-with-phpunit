<?php

use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /** @test */
    function it_scores_0_to_0()
    {
        $match = new TennisMatch();

        $this->assertEquals('love-love', $match->score());
    }

    /** @test */
    function it_scores_1_to_0()
    {
        $match = new TennisMatch();

        $match->pointToPlayerOne();

        $this->assertEquals('fifteen-love', $match->score());
    }

    /** @test */
    function it_scores_2_to_0()
    {
        $match = new TennisMatch();

        $match->pointToPlayerOne();
        $match->pointToPlayerOne();

        $this->assertEquals('thirty-love', $match->score());
    }
}
