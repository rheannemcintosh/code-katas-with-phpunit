<?php

use App\BottlesSong;
use PHPUnit\Framework\TestCase;

class BottlesSongTest extends TestCase
{
    /** @test */
    function ninety_nine_bottles_verse()
    {
        $expected = <<<EOT
            99 bottles of beer on the wall
            99 bottles of beer
            Take one down and pass it around
            98 bottles of beer on the wall
            
            EOT;

        $result = (new BottlesSong)->verse(99);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    function it_gets_the_ninety_eight_bottles_verse()
    {
        $expected = <<<EOT
            98 bottles of beer on the wall
            98 bottles of beer
            Take one down and pass it around
            97 bottles of beer on the wall
        
            EOT;

        $result = (new BottlesSong)->verse(98);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    function it_gets_the_ninety_seven_bottles_verse()
    {
        $expected = <<<EOT
            97 bottles of beer on the wall
            97 bottles of beer
            Take one down and pass it around
            96 bottles of beer on the wall
        
            EOT;

        $result = (new BottlesSong)->verse(97);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    function it_gets_the_two_bottles_verse()
    {
        $expected = <<<EOT
            2 bottles of beer on the wall
            2 bottles of beer
            Take one down and pass it around
            1 bottle of beer on the wall
            
            EOT;

        $result = (new BottlesSong)->verse(2);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    function it_gets_the_one_bottle_verseverse()
    {
        $expected = <<<EOT
            1 bottle of beer on the wall
            1 bottle of beer
            Take one down and pass it around
            No more bottles of beer on the wall
            
            EOT;

        $result = (new BottlesSong)->verse(1);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    function it_gets_the_zero_bottles_verse()
    {
        $expected = <<<EOT
            No more bottles of beer on the wall
            No more bottles of beer
            Go to the store and buy some more
            99 bottles of beer on the wall
            
            EOT;

        $result = (new BottlesSong)->verse(0);

        $this->assertEquals($expected, $result);
    }


    /** @test */
    function it_gets_the_lyrics()
    {
        $expected = file_get_contents(__DIR__ . '/stubs/lyrics.stub');

        $result = (new BottlesSong)->sing();

        $this->assertEquals($expected, $result);
    }
}
