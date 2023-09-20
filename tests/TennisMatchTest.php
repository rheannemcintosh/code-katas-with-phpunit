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
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [3, 3, 'deuce'],
            [3, 4, 'Advantage: Jane'],
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jane'],
            [4, 3, 'Advantage: John'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
        ];
    }

    /**
     * @test
     * @dataProvider scores
     */
    function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch('John', 'Jane');

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->pointToPlayerOne();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $match->pointToPlayerTwo();
        }

        $this->assertEquals($score, $match->score());
    }
}
