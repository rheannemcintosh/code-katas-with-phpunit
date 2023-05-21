<?php


namespace App;


class RomanNumerals
{
    public static function generate($number)
    {
        $result = '';

        while ($number > 3) {
            $result .= 'IV';

            $number -= 4;
        }

        while ($number > 0) {
            $result .= 'I';

            $number -= 1;
        }

        return $result;
    }
}