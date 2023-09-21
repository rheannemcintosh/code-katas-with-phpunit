<?php

namespace App;

class FizzBuzz
{
    public static function convert(int $number)
    {
        if ($number % 5 == 0)  {
            return 'buzz';
        }

        return 'fizz';
    }
}
