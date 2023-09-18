<?php

namespace App;

class StringCalculator
{
    public function add(string $numbers)
    {
        if (! $numbers) {
            return 0;
        }

        $numbers = preg_split("/,|\n/", $numbers);

        foreach ($numbers as $number) {
            if ($number < 0 ) {
                throw new \Exception('Negative numbers are disallowed');
            }
        }

        return array_sum($numbers);
    }
}