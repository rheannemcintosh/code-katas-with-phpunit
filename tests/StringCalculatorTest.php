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

    /** @test */
    function it_finds_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5'));
    }

    /** @test */
    function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add('5,5'));
    }

    /** @test */
    function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(15, $calculator->add('1,2,3,4,5'));
    }

    /** @test */
    function it_accepts_a_new_line_character_as_a_delimiter_too()
    {
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add("5\n5"));
    }
}
