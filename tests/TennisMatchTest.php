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
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [3, 3, 'deuce'],
            [4, 0, 'Winner: Player 1'],
            [0, 4, 'Winner: Player 2'],
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

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $match->pointToPlayerTwo();
        }

        $this->assertEquals($score, $match->score());
    }
}
