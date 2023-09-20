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
}
