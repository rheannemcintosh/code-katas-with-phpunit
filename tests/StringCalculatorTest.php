<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function it_evaluates_an_empty_string_as_0()
    {
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(''));
    }
}
