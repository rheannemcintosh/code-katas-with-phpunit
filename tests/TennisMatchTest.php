<?php

use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [2, 0, 'thirty-love'],
        ];
    }

    /**
     * @test
     * @dataProvider scores
     */
    function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch();

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->pointToPlayerOne();
        }

        $this->assertEquals($score, $match->score());
    }
}
